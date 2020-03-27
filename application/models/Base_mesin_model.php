<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_mesin_model extends CI_Model {

	public function get_all()
	{
		$res = $this->db->get('base_mesin');
		return $res;
	}

	public function insert($no_mesin, $nama_mesin, $tonase)
	{
		$data = [
					'no_mesin' 		=>$no_mesin,
					'nama_mesin'	=>$nama_mesin,
					'tonase' 		=>$tonase
				];
		$res = $this->db->insert('base_mesin',$data);
		return $res;
	}

	public function delete($id_mesin)
	{
		$this->db->where('id_mesin',$id_mesin);
		$res = $this->db->delete('base_mesin');
		return $res;
	}

	public function update($id_mesin, $no_mesin, $nama_mesin, $tonase)
	{
		$data = [
					'no_mesin' 		=>$no_mesin,
					'nama_mesin'	=>$nama_mesin,
					'tonase' 		=>$tonase
				];
		$this->db->where('id_mesin',$id_mesin);
		$this->db->set($data);
		$res = $this->db->update('base_mesin');
		return $res;
	}
}
