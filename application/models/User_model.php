<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


	public function get_user($username, $password)
	{
		$data = ['username'=>$username, 'password'=>$password];
		$this->db->where($data);
		$res = $this->db->get('users');
		return $res;
	}

	public function get_by_id($id)
	{
		$data = ['id'=>$id];
		$this->db->where($data);
		$res = $this->db->get('users');
		return $res;
	}

	public function get()
	{
		$res = $this->db->get('users');
		return $res;
	}

	public function adduser($username, $privilages, $password)
	{
		$data = [
			'username'=>$username,
			'password'=>$password,
			'privilages'=>$privilages,
		];

		$res = $this->db->insert('users',$data);
		return $res;
	}

	public function edit_user($id, $username, $email, $privilages, $password)
	{
		$data = [
			'username'=>$username,
			'privilages'=>$privilages,
			'password'=>$password
		];
		$this->db->set($data);
		$this->db->where('id',$id);
		$res = $this->db->update('users');
		return $res;
	}

	public function delete($id)
	{
		$this->db->where('id_user',$id);
		$res = $this->db->Delete('users');
		return $res;
	}
}
