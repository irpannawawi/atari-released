<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model {

	public function get()
	{
		$this->db->limit(100,0);
		//$this->db->like('tanggal_input',date('d/m/Y'));
		$this->db->order_by('tanggal_input','ASC');
		$res = $this->db->get('history_produksi');
		return $res;
	}

	public function get_all()
	{
		$this->db->order_by('tanggal_input','ASC');
		$res = $this->db->get('history_produksi');
		return $res;
	}

	public function search($keyword)
	{
		$this->db->like('nama_cust',$keyword);
		$this->db->or_like('nama_barang',$keyword);
		$this->db->or_like('warna',$keyword);
		$res = $this->db->get('history_produksi');
		return $res;
		
	}


	public function get_by_id($id)
	{
		$this->db->where('id',$id);
		$res = $this->db->get('history_produksi');
		return $res;
	}



	public function get_list_barang()
	{
		$sql = "SELECT DISTINCT nama_barang FROM history_produksi ORDER BY nama_barang ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_cust()
	{
		$sql = "SELECT DISTINCT nama_cust FROM history_produksi ORDER BY nama_cust ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_jenis_input()
	{
		$sql = "SELECT DISTINCT jenis_input FROM history_produksi ORDER BY jenis_input ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_warna()
	{
		$sql = "SELECT DISTINCT warna FROM history_produksi ORDER BY warna ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_spesific($data)
	{
		$this->db->like($data);
		$res = $this->db->get('history_produksi');
		return $res;
	}
}
