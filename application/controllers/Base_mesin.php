<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_mesin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}

	public function index()
	{
		$mesin = $this->base_mesin_model->get_all();
		$data['list_mesin'] = $mesin->result();
		$this->load->view('admin/template/header',['title'=>"PPIC | Base Mesin"]);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/base_mesin/list_mesin',$data);
		$this->load->view('admin/template/footer');		
	}

	public function add_new()
	{
		$no_mesin 	= $this->input->post('no_mesin');
		$nama_mesin = $this->input->post('nama_mesin');
		$tonase 	= $this->input->post('tonase');
		
		$res = $this->base_mesin_model->insert($no_mesin, $nama_mesin, $tonase);
		
		if ($res) {
			print_r(json_encode(['status'=>TRUE]));
		}else{
			print_r(json_encode(['status'=>FALSE]));
		}
	}
	public function table()
	{
		$mesin = $this->base_mesin_model->get_all();
		$data['list_mesin'] = $mesin->result();
		$this->load->view('admin/base_mesin/table_list_mesin',$data);
	}

	public function delete()
	{
		$id = $this->input->post('id_mesin');
		$res = $this->base_mesin_model->delete($id);
		if ($res) {
			print_r(json_encode(['status'=>true]));
		}else{
			print_r(json_encode(['status'=>false, 'err_code'=>$res->error]));
		}
	}

	public function edit()
	{
		$id_mesin		= $this->input->post('id_mesin');
		$no_mesin 		= $this->input->post('no_mesin');
		$nama_mesin 	= $this->input->post('nama_mesin');
		$tonase 		= $this->input->post('tonase');

		$res = $this->base_mesin_model->update($id_mesin, $no_mesin, $nama_mesin, $tonase );
		
		if ($res) {
			print_r(json_encode(['status'=>true]));
		}else{
			print_r(json_encode(['status'=>false, 'err_code'=>$res->error]));
		}
	}
}
