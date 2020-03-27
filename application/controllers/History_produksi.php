<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_produksi extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}

	public function index($get_all = false)
	{
		
		$list_nama_barang 	= $this->history_model->get_list_barang();
		$list_nama_customer = $this->history_model->get_list_cust();
		$list_jenis_input 	= $this->history_model->get_list_jenis_input();
		$list_warna 		= $this->history_model->get_list_warna();

		
		$data['list_nama_barang'] 	= $list_nama_barang->result();
		$data['list_nama_customer'] = $list_nama_customer->result();
		$data['list_jenis_input']	= $list_jenis_input->result();
		$data['list_warna']			= $list_warna->result();
		
		$data['title'] 					= "Cv. Atari Plastik | History Produksi";
		if ($get_all) {
			$history = $this->history_model->get_all();
		}else{
			$history = $this->history_model->get();
		}
		$data['history'] = $history->result();
		$this->load->view('public/tb_history',$data);	
	}

	public function history_search()
	{

		$keyword 				= $this->input->post('keyword');
		$history 	 			= $this->history_model->search($keyword);
		$data['history'] 		= $history->result();
		$this->load->view('public/tb_history_filtered',$data);
	
	}

	public function history_filtered()
	{

		$jenis_input 	= $this->input->post('jenis_input');
		$nama_barang 	= $this->input->post('nama_barang');
		$nama_cust 		= $this->input->post('nama_cust');
		$warna 			= $this->input->post('warna');
		$tanggal_input 	= $this->input->post('tanggal_input');

		$clause_parm = [
			'jenis_input'=>$jenis_input,
			'nama_barang'=>$nama_barang,
			'nama_cust'=>$nama_cust,
			'warna'=>$warna,
			'tanggal_input'=>$tanggal_input
		];
		$data['title'] 		= "Admin | laporan Produksi";
		$history 			= $this->history_model->get_spesific($clause_parm);
		$data['history'] 	= $history->result();
		$this->load->view('public/tb_history_filtered',$data);
	
	}
}
