<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_area extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	
	public function index()
	{
		$this->load->view('public/home_page');
	}

	public function home()
	{
		$this->load->view('public/home_page');
	}


	public function lap_pengiriman()
	{
		$data['title'] 					= "Admin | Laporan Pengiriman";
		$barang_keluar = $this->pengiriman_model->get();
		$data['barang_keluar'] = $barang_keluar->result();
		$this->load->view('public/tb_pengiriman',$data);
	}

	public function produksi_filtered()
	{

		$part_no 		= $this->input->post('part_no');
		$nama_barang 	= $this->input->post('nama_barang');
		$nama_cust 		= $this->input->post('nama_cust');
		$warna 			= $this->input->post('warna');
		$bahan 			= $this->input->post('bahan');

		$clause_parm = [
			'part_no'=>$part_no,
			'nama_barang'=>$nama_barang,
			'nama_cust'=>$nama_cust,
			'warna'=>$warna,
			'bahan'=>$bahan
		];
		$data['title'] 					= "Admin | laporan Produksi";
		$barang_masuk = $this->produksi_model->get_spesific($clause_parm);
		$data['barang_masuk'] = $barang_masuk->result();
		$this->load->view('public/tb_produksi_filtered',$data);
	
	}


	public function produksi_search()
	{

		$keyword 				= $this->input->post('keyword');
		$data['title'] 			= "Admin | laporan Produksi";
		$barang_masuk 			= $this->produksi_model->search($keyword);
		$data['barang_masuk'] 	= $barang_masuk->result();
		$this->load->view('public/tb_produksi_filtered',$data);
	
	}

	

	
}
