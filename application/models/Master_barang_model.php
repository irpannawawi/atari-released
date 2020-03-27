<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_barang_model extends CI_Model {

	public function get_by_part($part_no)
	{
		$this->db->where('part_no',$part_no);
		$res = $this->db->get('master_barang');
		return $res;
	}

	public function get($start=0, $per_page=50)
	{
		$this->db->limit($per_page,$start);
		$this->db->order_by('id','ASC');
		$res = $this->db->get('master_barang');
		return $res;
	}

	public function get_all($no_limit=False, $sort='ASC')
	{
		if ($no_limit == False) {
			$this->db->limit(50,0);
		}

		$this->db->order_by('id',$sort);
		$res = $this->db->get('master_barang');
		return $res;
	}

	public function get_nama_plus_part_no()
	{
		$sql = "SELECT DISTINCT nama_barang, part_no, warna FROM master_barang ORDER BY nama_barang ASC";
		$res = $this->db->query($sql);
		return $res->result();
	}

	public function get_list_barang()
	{
		$sql = "SELECT DISTINCT nama_barang FROM master_barang ORDER BY nama_barang ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_cust()
	{
		$sql = "SELECT DISTINCT nama_customer_m FROM master_barang ORDER BY nama_customer_m ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_part_no()
	{
		$sql = "SELECT DISTINCT part_no FROM master_barang ORDER BY part_no ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_warna()
	{
		$sql = "SELECT DISTINCT warna FROM master_barang ORDER BY warna ASC";
		$res = $this->db->query($sql);
		return $res;
	}
	public function get_list_bahan()
	{
		$sql = "SELECT DISTINCT bahan FROM master_barang ORDER BY bahan ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_spesific($data)
	{
		$this->db->like($data);
		$res = $this->db->get('master_barang');
		return $res;
	}

	public function search_by_kd_cust($keyword)
	{
		$this->db->where('kode_customer',$keyword);
		$this->db->select_max('kode_barang','last_value');
		$res = $this->db->get('master_barang');

		$last_value = $res->result()[0]->last_value;
		$sql = "SELECT * FROM master_barang where kode_barang='$last_value'";
		$jumlah = $this->db->query($sql)->num_rows();
		return [
			'last_data'=>$last_value,
			'num_rows'=>$jumlah+1
				];
	}

	public function insert($data)
	{
		$res = $this->db->insert('master_barang',$data);
		if ($res) {
			return True;
		}else{
			return False;
		}
	}

	public function delete($id)
	{
		$res = $this->db->where('id',$id)->delete('master_barang');
		return $res;
	}

}
