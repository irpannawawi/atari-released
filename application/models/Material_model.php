<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_model extends CI_Model {

	public function get()
	{
		$this->db->limit(100,0);
		//$this->db->like('tanggal_input',date('d/m/Y'));
		$this->db->order_by('nama_barang','ASC');
		$res = $this->db->get('list_material');
		return $res;
	}

	public function get_all()
	{
		$this->db->order_by('nama_barang','ASC');
		$res = $this->db->get('list_material');
		return $res;
	}

	public function search($keyword)
	{
		$this->db->like('nama_supplier',$keyword);
		$this->db->or_like('nama_barang',$keyword);
		$res = $this->db->get('list_material');
		return $res;
		
	}


	public function get_by_id($id)
	{
		$this->db->where('id',$id);
		$res = $this->db->get('list_material');
		return $res;
	}



	public function get_list_barang()
	{
		$sql = "SELECT DISTINCT nama_barang FROM list_material ORDER BY nama_barang ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_supplier()
	{
		$sql = "SELECT DISTINCT nama_supplier FROM list_material ORDER BY nama_supplier ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_spesific($data)
	{
		$this->db->like($data);
		$res = $this->db->get('list_material');
		return $res;
	}
}
