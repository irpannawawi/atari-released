<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_produksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	
	public function index($get_all = false)
	{
		
		$list_nama_barang 	= $this->produksi_model->get_list_barang();
		$list_nama_customer = $this->produksi_model->get_list_cust();
		$list_part_no 		= $this->produksi_model->get_list_part_no();
		$list_warna 		= $this->produksi_model->get_list_warna();
		$list_bahan 		= $this->produksi_model->get_list_bahan();
		
		$data['list_nama_barang'] 	= $list_nama_barang->result();
		$data['list_nama_customer'] = $list_nama_customer->result();
		$data['list_part_no']		= $list_part_no->result();
		$data['list_bahan']			= $list_bahan->result();
		$data['list_warna']			= $list_warna->result();
		
		$data['title'] 					= "Admin | laporan Produksi";
		if ($get_all) {
			$barang_masuk = $this->produksi_model->get_all();
		}else{
			$barang_masuk = $this->produksi_model->get();
		}
		$data['barang_masuk'] = $barang_masuk->result();
		$this->load->view('public/tb_produksi',$data);	
	}
}
