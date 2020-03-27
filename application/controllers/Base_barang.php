<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	public function index()
	{
		$list_barang = $this->master_barang_model->get_all(TRUE,'DESC');
		$list_warna = $this->master_barang_model->get_list_warna();
		$data['list_barang'] = $list_barang->result();
		$data['list_warna']  = $list_warna->result();
		$d =[];
		$n = 0;
		foreach ($data['list_warna'] as $key) {
			$d[$n] = $key->warna;
			$n++;
		}
		$data['list_warna'] = $d;


		$this->load->view('admin/template/header',['title'=>'Database | Barang']);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/base_barang/list_barang',$data);
		$this->load->view('admin/template/footer');
	}

	public function search_kd_barang()
	{
		$keyword = $this->input->post('kode_customer');

		$res = $this->master_barang_model->search_by_kd_cust($keyword);
		
		echo json_encode($res);
	}

	public function add_new()
	{
		$data = $_POST;
		$data['part_no'] = $this->input->post('kode_customer')."-".$this->input->post('kode_barang')."-".$this->input->post('no_urut');
		$res = $this->master_barang_model->insert($data);
		if ($res) {
			$this->session->set_flashdata('message',"Item Baru Berhasil Ditambahkan.");
			redirect('base_barang');
		}else{
			$this->session->set_flashdata('err_message',"Item Baru Tidak Berhasil Ditambahkan.");
			redirect('base_barang');	
		}
	}

	public function delete()
	{
		$id = $this->input->post('id_barang');
		$res = $this->master_barang_model->delete($id);
		if ($res) {
			print_r(json_encode(['status'=>true]));
		}else{
			print_r(json_encode(['status'=>false, 'err_code'=>$res->error]));
		}
	}
	
}