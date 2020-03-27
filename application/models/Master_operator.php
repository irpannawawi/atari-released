<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_operator extends CI_Model {

	public function get_all_operator()
	{
		$res = $this->db->get('base_operator');
		return $res;
	}
	
}
