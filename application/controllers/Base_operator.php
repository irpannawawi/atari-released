<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_operator extends CI_Controller {
	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	public function index()
	{
		$operator = $this->base_operator_model->get_all();
		$data['list_operator'] = $operator->result();
		$this->load->view('admin/template/header',['title'=>"PPIC | Base Operator"]);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/base_operator/list_operator',$data);
		$this->load->view('admin/template/footer');		
	}

	public function add_new()
	{
		$nama_op = $this->input->post('nama_operator');
		$res = $this->base_operator_model->insert($nama_op);
		if ($res) {
			print_r(json_encode(['status'=>TRUE]));
		}else{
			print_r(json_encode(['status'=>FALSE]));
		}
	}
	public function table()
	{
		$operator = $this->base_operator_model->get_all();
		$data['list_operator'] = $operator->result();
		$this->load->view('admin/base_operator/table_list_operator',$data);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$res = $this->base_operator_model->delete($id);
		if ($res) {
			print_r(json_encode(['status'=>true]));
		}else{
			print_r(json_encode(['status'=>false, 'err_code'=>$res->error]));
		}
	}

	public function edit()
	{
		$id 			= $this->input->post('id');
		$nama_operator 	= $this->input->post('nama_operator');

		$res = $this->base_operator_model->update($id,$nama_operator);
		
		if ($res) {
			print_r(json_encode(['status'=>true]));
		}else{
			print_r(json_encode(['status'=>false, 'err_code'=>$res->error]));
		}
	}
}
