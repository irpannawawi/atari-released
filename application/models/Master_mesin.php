<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_mesin extends CI_Model {

	public function get_mesin()
	{
		$this->db->order_by('no_mesin','ASC');
		$res = $this->db->get('base_mesin');
		return $res->result();
	}
}
