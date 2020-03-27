<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_material extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	
	public function index($get_all = false)
	{
		
		$list_nama_barang 	= $this->material_model->get_list_barang();
		$list_nama_supplier = $this->material_model->get_list_supplier();

		
		$data['list_nama_barang'] 	= $list_nama_barang->result();
		$data['list_nama_supplier'] = $list_nama_supplier->result();

		
		$data['title'] 					= "Admin | laporan Material";
		if ($get_all) {
			$material = $this->material_model->get_all();
		}else{
			$material = $this->material_model->get();
		}
		$data['material'] = $material->result();
		$this->load->view('public/tb_material',$data);	
	}

	public function material_filtered()
	{

		$nama_barang 	= $this->input->post('nama_barang');
		$nama_supplier 		= $this->input->post('nama_supplier');

		$clause_parm = [
			'nama_barang'=>$nama_barang,
			'nama_supplier'=>$nama_supplier
		];
		$data['title'] 					= "Admin | laporan Produksi";
		$material = $this->material_model->get_spesific($clause_parm);
		$data['material'] = $material->result();
		$this->load->view('public/tb_material_filtered',$data);
	
	}


	public function material_search()
	{

		$keyword 				= $this->input->post('keyword');
		$data['title'] 			= "Admin | laporan Material";
		$material 			= $this->material_model->search($keyword);
		$data['material'] 	= $material->result();
		$this->load->view('public/tb_material_filtered',$data);
	
	}
}
