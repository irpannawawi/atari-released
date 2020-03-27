<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_harian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	
	public function index()
	{
		$list_production = $this->produksi_model->get_running_production();
		$data['list_production'] =$list_production->result();


		$this->load->view('admin/template/header',['title'=>'PPIC | Rencana Harian']);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/rencana_harian/list',$data);
		$this->load->view('admin/template/footer');
	}
}
