<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_model extends CI_Model {

	public function get()
	{
		$this->db->order_by('nama_cust','ASC');
		$this->db->limit(50,0);
		$res = $this->db->get('list_barang');
		return $res;
	}

	public function get_all()
	{
		$this->db->order_by('nama_cust','ASC');
		$res = $this->db->get('list_barang');
		return $res;
	}

	public function search($keyword)
	{
		$this->db->like('nama_cust',$keyword);
		$this->db->or_like('nama_barang',$keyword);
		$this->db->or_like('part_no',$keyword);
		$this->db->or_like('bahan',$keyword);
		$this->db->or_like('warna',$keyword);
		$res = $this->db->get('list_barang');
		return $res;
		
	}

	public function get_all_production()
	{
		$this->db->select('*');
		$this->db->from('production');
		$this->db->join('po_table','production.no_po=po_table.no_po AND production.part_no=po_table.part_no','inner');
		$this->db->join('master_barang','production.part_no=master_barang.part_no','left');
		$this->db->join('base_mesin','production.no_mesin=base_mesin.no_mesin','left');
		// $this->db->where('po_table.blnc_prod <= po_table.qty');
		$this->db->order_by('id_production','ASC');
		/*$sql = "SELECT * FROM `production` 
							INNER JOIN po_table on 
							production.no_po=po_table.no_po AND production.part_no=po_table.part_no 
							LEFT JOIN master_barang on 
							production.part_no=master_barang.part_no 
							LEFT JOIN base_mesin ON 
							production.no_mesin=base_mesin.no_mesin ORDER BY production.id_production ASC";*/
		$res = $this->db->get();
		$this->db->reset_query();
		return $res;
	}

	public function get_running_production()
	{
		$this->db->select('*');
		$this->db->from('production');
		$this->db->join('po_table','production.no_po=po_table.no_po AND production.part_no=po_table.part_no','inner');
		$this->db->join('master_barang','production.part_no=master_barang.part_no','left');
		$this->db->join('base_mesin','production.no_mesin=base_mesin.no_mesin','left');
		// $this->db->where('po_table.blnc_prod < po_table.qty');
		$this->db->where('production.status','RUNNING');
		$this->db->where('production.no_mesin!=','');
		$this->db->order_by('base_mesin.no_mesin','ASC');
		/*$sql = "SELECT * FROM `production` 
							INNER JOIN po_table on 
							production.no_po=po_table.no_po AND production.part_no=po_table.part_no 
							LEFT JOIN master_barang on 
							production.part_no=master_barang.part_no 
							LEFT JOIN base_mesin ON 
							production.no_mesin=base_mesin.no_mesin ORDER BY production.id_production ASC";*/
		$res = $this->db->get();
		$this->db->reset_query();
		return $res;
	}

	public function get_oustanding_production()
	{
		$this->db->select('*');
		$this->db->from('production');
		$this->db->join('po_table','production.no_po=po_table.no_po AND production.part_no=po_table.part_no','inner');
		$this->db->join('master_barang','production.part_no=master_barang.part_no','left');
		$this->db->join('base_mesin','production.no_mesin=base_mesin.no_mesin','left');
		// $this->db->where('po_table.blnc_prod < po_table.qty');
		$this->db->where('po_table.blnc_prod>','0');
		// $this->db->where('production.no_mesin!=','');
		$this->db->order_by('po_table.id','ASC');
		/*$sql = "SELECT * FROM `production` 
							INNER JOIN po_table on 
							production.no_po=po_table.no_po AND production.part_no=po_table.part_no 
							LEFT JOIN master_barang on 
							production.part_no=master_barang.part_no 
							LEFT JOIN base_mesin ON 
							production.no_mesin=base_mesin.no_mesin ORDER BY production.id_production ASC";*/
		$res = $this->db->get();
		$this->db->reset_query();
		return $res;
	}

	public function get_production($no_po, $part_no)
	{

		$this->db->reset_query();
		$this->db->select('*');
		$this->db->from('production');
		$this->db->join('po_table','production.no_po=po_table.no_po AND production.part_no=po_table.part_no','inner');
		$this->db->join('master_barang','production.part_no=master_barang.part_no','left');
		$this->db->join('base_mesin','production.no_mesin=base_mesin.no_mesin','left');
		// $this->db->where('po_table.blnc_prod < po_table.qty');
		$this->db->where('production.no_po',$no_po);
		$this->db->where('production.part_no',$part_no);
		
		$res = $this->db->get();
		$this->db->reset_query();
		return $res;
	}

	public function get_this_month()
	{
		//$this->db->like('date',date('m/Y'));
		$res = $this->db->get('list_barang');
		return $res;
	}

	public function get_by_id($id)
	{
		$this->db->where('id',$id);
		$res = $this->db->get('list_barang');
		return $res;
	}

	public function insert_daily($data)
	{
		$res = $this->db->insert('daily_production',$data);
		return $res;
	}

	public function set_status($status,$id_production)
	{
		$this->db->where('id_production',$id_production);
		if ($status == 'stop') {
			$this->db->set('status','STOPED');
		}elseif ($status=='running') {
			$this->db->set('status','RUNNING');
		}
		$res = $this->db->update('production');
		return $res;
	}

	public function set_machine($machine,$id_production)
	{
		$this->db->where('id_production',$id_production);
		
		$this->db->set('no_mesin',$machine);
		$res = $this->db->update('production');
		return $res;
	}

	public function delete($id)
	{
		$this->db->where('id_transaction',$id);
		$res = $this->db->delete('tb_barang_masuk');
		return $res;
	}

	public function get_list_barang()
	{
		$sql = "SELECT DISTINCT nama_barang FROM list_barang ORDER BY nama_barang ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_cust()
	{
		$sql = "SELECT DISTINCT nama_cust FROM list_barang ORDER BY nama_cust ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_part_no()
	{
		$sql = "SELECT DISTINCT part_no FROM list_barang ORDER BY part_no ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_list_warna()
	{
		$sql = "SELECT DISTINCT warna FROM list_barang ORDER BY warna ASC";
		$res = $this->db->query($sql);
		return $res;
	}
	public function get_list_bahan()
	{
		$sql = "SELECT DISTINCT bahan FROM list_barang ORDER BY bahan ASC";
		$res = $this->db->query($sql);
		return $res;
	}

	public function get_spesific($data)
	{
		$this->db->like($data);
		$res = $this->db->get('list_barang');
		return $res;
	}

	public function insert_production($no_po, $part_no)
	{
		$res = $this->db->insert('production',['no_po'=>$no_po,'part_no'=>$part_no]);
		return $res;
	}

	public function get_wip_lalu($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$bln_lalu = $bln-1<1?12:$bln-1;
		$thn = $bln-1<0?date('Y')-1:date('Y');
		$parm_date=  $bln_lalu.'/'.$thn;
		
		//$sql = "SELECT SUM(wip) FROM daily_production where no_po='$no_po' AND part_no='$part_no' AND tanggal_input LIKE '%$parm_date'";
		$sql = $this->db->select_sum('wip')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->wip != null){
			return $res->result()[0]->wip;
		}else{
			return 0;
		}
	}

	public function get_wip_bln_ini($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$thn = date('Y');
		$parm_date=  $bln.'/'.$thn;
		
		//$sql = "SELECT SUM(wip) FROM daily_production where no_po='$no_po' AND part_no='$part_no' AND tanggal_input LIKE '%$parm_date'";
		$sql = $this->db->select_sum('wip')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->wip != null){
			return $res->result()[0]->wip;
		}else{
			return 0;
		}
	}

	public function get_fg_lalu($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$bln_lalu = $bln-1<1?12:$bln-1;
		$thn = $bln-1<0?date('Y')-1:date('Y');
		$parm_date=  $bln_lalu.'/'.$thn;
		
		$sql = $this->db->select_sum('fg')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->fg != null){
			return $res->result()[0]->fg;
		}else{
			return 0;
		}
	}

	public function get_fg_bln_ini($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$thn = date('Y');
		$parm_date=  $bln.'/'.$thn;
		
		$sql = $this->db->select_sum('fg')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->fg != null){
			return $res->result()[0]->fg;
		}else{
			return 0;
		}
	}

	public function get_bahan_lalu($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$thn = date('Y');
		$parm_date=  $bln.'/'.$thn;
		
		$sql = $this->db->select_sum('bahan_keluar')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->bahan_keluar != null){
			return $res->result()[0]->bahan_keluar;
		}else{
			return 0;
		}
	}

	public function get_gilingan_lalu($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$thn = date('Y');
		$parm_date=  $bln.'/'.$thn;
		
		$sql = $this->db->select_sum('gilingan')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->gilingan != null){
			return $res->result()[0]->gilingan;
		}else{
			return 0;
		}
	}

	public function get_kirim_lalu($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$thn = date('Y');
		$parm_date=  $bln.'/'.$thn;
		
		$sql = $this->db->select_sum('qty_kirim')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->qty_kirim != null){
			return $res->result()[0]->qty_kirim;
		}else{
			return 0;
		}
	}

	public function get_reject_lalu($no_po, $part_no)
	{
		$this->db->reset_query();
		$bln = date('m');
		$thn = date('Y');
		$parm_date=  $bln.'/'.$thn;
		
		$sql = $this->db->select_sum('ng_total')
									->where(['part_no'=>$part_no,'no_po'=>$no_po])
									->like('tanggal_input',$parm_date)
									->get_compiled_select('daily_production',FALSE); 
		$res = $this->db->query($sql);
		if($res->result()[0]->ng_total != null){
			return $res->result()[0]->ng_total;
		}else{
			return 0;
		}
	}


	public function update_blnc($no_po, $part_no, $blnc_prod)
	{
		$this->db->reset_query();	
		$this->db->where(['no_po'=>$no_po, 'part_no'=>$part_no]);
		$this->db->set('blnc_prod',$blnc_prod);
		$res = $this->db->update('po_table');
		return $res;
	}
}
