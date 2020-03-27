<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_operator_model extends CI_Model {

	public function get_all()
	{
		$res = $this->db->get('base_operator');
		return $res;
	}

	public function insert($nama)
	{
		$res = $this->db->insert('base_operator',['nama_operator'=>$nama]);
		return $res;
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->db->where('id_operator',$id);
		$res = $this->db->delete('base_operator');
		return $res;
	}

	public function update($id,$nama)
	{
		$this->db->where('id_operator',$id);
		$this->db->set('nama_operator',$nama);
		$res = $this->db->update('base_operator');
		return $res;
	}
}
