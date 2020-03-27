<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		

		$produksi = $this->produksi_model->get_all_production();
		$n=0;
		$res = $produksi->result();

		//print_r($this->db->last_query());die;
		foreach ($res as $key) {
			$data[$n]['no_po'] 			= $key->no_po;	
			$data[$n]['tanggal_po'] 	= $key->tanggal_po;
			$data[$n]['part_no']		= $key->part_no;
			$data[$n]['nama_barang']	= $key->nama_barang;	
			echo $data[$n]['customer']	= $key->nama_customer;
			echo $key->no_mesin;
			$data[$n]['bahan']			= $key->bahan;	
			$data[$n]['warna'] 			= $key->warna;	
			$data[$n]['qty_po']			= $qty_po			= $key->qty;	
			$data[$n]['no_mesin']		= $key->no_mesin;	
			$data[$n]['tonase']			= $key->tonase;	
			$data[$n]['nama_mesin']		= $key->nama_mesin;
			$data[$n]['target_jam']		= $target_jam 		= round(3600/$key->ct*$key->cav);
			$data[$n]['target_shift']	= $target_shift 	= $target_jam*8;
			$data[$n]['target_hari']	= $target_hari 		= $target_shift*3;
			$data[$n]['ct'] 			= $key->ct;
			$data[$n]['cav'] 			= $key->cav;	
			$data[$n]['bruto'] 			= $key->bruto;	
			$data[$n]['netto'] 			= $key->netto;	
			
			
			$wip_bln_lalu	= $this->produksi_model->get_wip_lalu($data[$n]['no_po'], $data[$n]['part_no']);
			$fg_bln_lalu	= $this->produksi_model->get_fg_lalu($data[$n]['no_po'], $data[$n]['part_no']);
			$reject_lalu	= $this->produksi_model->get_reject_lalu($data[$n]['no_po'], $data[$n]['part_no']);
			$bahan_lalu		= $this->produksi_model->get_bahan_lalu($data[$n]['no_po'], $data[$n]['part_no'])
							  +$this->produksi_model->get_gilingan_lalu($data[$n]['no_po'], $data[$n]['part_no']);
			$kirim_lalu		= $this->produksi_model->get_kirim_lalu($data[$n]['no_po'], $data[$n]['part_no']);

			$wip_bln_ini	= $this->produksi_model->get_wip_bln_ini($data[$n]['no_po'], $data[$n]['part_no']);
			$fg_bln_ini 	= $this->produksi_model->get_fg_bln_ini($data[$n]['no_po'], $data[$n]['part_no']);
			//var_dump($wip_bln_ini->result());

			$total_wip 		= $wip_bln_ini + $wip_bln_lalu;
			$total_fg 		= $fg_bln_ini + $fg_bln_lalu;
			$blnc_prod 		= $qty_po - $total_fg - $total_wip;
			$lama_prod 		= round($blnc_prod/$target_jam);
				

			/*
										
				
				
			Reject Bulan Ini	
			Bahan Bulan Ini	
			Kirim Bulan Ini	
				
			TOTAL REJECT	
			TOTAL Bahan Keluar	
			TOTAL Bahan Terpakai	
			Total Kirim	
			Sisa Kirim PO	
			Kekurangan Bahan	
			Keb' Bahan PO	
			Over/Less	
			Sumber Material	
			Status Produksi	(on table)
			Status	Running(on table)*/
			echo "<hr>";
			$n++;
		}
	}

	public function test()
	{
		//get
		$no_po = "PO/AT/20/01/002";
		$part_no = "ZP-183-2";
		$res = $this->produksi_model->get_production($no_po, $part_no)->result()[0];
		
		
		$wip_bln_lalu   = $this->produksi_model->get_wip_lalu(    $res->no_po,  $res->part_no);
		$wip_bln_ini    = $this->produksi_model->get_wip_bln_ini( $res->no_po,  $res->part_no);
	    $fg_bln_lalu    = $this->produksi_model->get_fg_lalu(     $res->no_po,  $res->part_no);
	    $fg_bln_ini     = $this->produksi_model->get_fg_bln_ini(  $res->no_po,  $res->part_no);

		$total_wip  = $wip_bln_ini + $wip_bln_lalu;
        $total_fg 	= $fg_bln_ini + $fg_bln_lalu;
		echo $blnc_prod 	= $res->qty - $total_fg - $total_wip;
		/*
		*/

	}

	public function temp()
	{
		$this->load->view('admin/template/header',['title'=>'Template']);
		$this->load->view('admin/template/sidebar');
	}

	public function print()
	{
		$this->load->view('admin/template/header');
		$this->load->view('paper_po_page');
	}
}