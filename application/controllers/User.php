<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	
	public function add()
	{
		$username 	= $this->input->post('username');
		$role 		= $this->input->post('role');
		$password 	= $this->input->post('password');

		$res = $this->user_model->adduser($username, $role, $password);
		if ($res) {
			$this->session->set_flashdata('status',"Data berhasil ditambahkan Username : $username");
			redirect('admin/users');
		}else{
			$this->session->set_flashdata('status',"Data Gagal ditambahkan  Error : $res->error");
			redirect('admin/users');
		}
	}

	public function edit()
	{
		$username 	= $this->input->post('username');
		$email 		= $this->input->post('email');
		$role 		= $this->input->post('privilages');
		$password 	= $this->input->post('password');
		$id			= $this->input->post('id');

		$res = $this->user_model->edit_user($id, $username, $email, $role, $password);
		if ($res) {
			$this->session->set_flashdata('status',"Data berhasil dirubah Username : $username");
			redirect('admin/users');
		}else{
			$this->session->set_flashdata('status',"Data Gagal dirubah  Error : $res->error");
			redirect('admin/users');
		}
	}


	public function delete($id)
	{
		$res = $this->user_model->delete($id);
		if ($res) {
			$this->session->set_flashdata('status',"Data berhasil Dihapus Id : $id");
			redirect('admin/users');
		}else{
			$this->session->set_flashdata('status',"Data Gagal Dihapus  Error : $res->error");
			redirect('admin/users');
		}
	}
}
