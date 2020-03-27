<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pengiriman extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	
	public function index($get_all = false)
	{
		
		$list_nama_barang 	= $this->pengiriman_model->get_list_barang();
		$list_nama_customer = $this->pengiriman_model->get_list_cust();
		$list_warna 		= $this->pengiriman_model->get_list_warna();

		
		$data['list_nama_barang'] 	= $list_nama_barang->result();
		$data['list_nama_customer'] = $list_nama_customer->result();
		$data['list_warna']			= $list_warna->result();
		
		$data['title'] 					= "Cv. Atari Plastik | Pengiriman";
		if ($get_all) {
			$pengiriman = $this->pengiriman_model->get_all();
		}else{
			$pengiriman = $this->pengiriman_model->get();
		}
		$data['pengiriman'] = $pengiriman->result();
		$this->load->view('public/tb_pengiriman',$data);	
	}

	public function pengiriman_search()
	{

		$keyword 				= $this->input->post('keyword');
		$pengiriman 	 		= $this->pengiriman_model->search($keyword);
		$data['pengiriman'] 	= $pengiriman->result();
		$this->load->view('public/tb_pengiriman_filtered',$data);
	
	}

	public function pengiriman_filtered()
	{

		$nama_barang 	= $this->input->post('nama_barang');
		$nama_cust 		= $this->input->post('nama_cust');
		$warna 			= $this->input->post('warna');
		$tanggal_input 	= $this->input->post('tanggal_input');

		$clause_parm = [
			'nama_barang'=>$nama_barang,
			'nama_cust'=>$nama_cust,
			'warna'=>$warna,
			'tanggal_input'=>$tanggal_input
		];
		$data['title'] 		= "Cv. Atari Plastik | laporan Pengiriman";
		$pengiriman 			= $this->pengiriman_model->get_spesific($clause_parm);
		$data['pengiriman'] 	= $pengiriman->result();
		$this->load->view('public/tb_pengiriman_filtered',$data);
	
	}
	
}
