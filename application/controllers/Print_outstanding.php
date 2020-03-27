<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_outstanding extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
		empty($this->session->role)?redirect('auth'):'';
    }

	public function index()
	{

		//fetching data from db 
		$list_production = $this->produksi_model->get_oustanding_production();
		$list_production =$list_production->result();

		$pdf = new FPDF();
		$pdf->AddPage('P','F4',0);
		$pdf->SetFont('Times','B',17);
		/*
			*Catatan
			Panjang kertas = 310pt
		*/
		
		
		//header
		$pdf->Cell(50,25,$pdf->Image(base_url('assets/img/'.'logoAtari.jpeg'),10,10,60),0);
		$pdf->Ln();

		$pdf->Cell(190,7,"Outstanding",0,0,'C');
		$pdf->Ln();
		//date info
		$pdf->SetFont('Times','',14);
		$pdf->Cell(190,7,date('d/m/Y'),0,0,'C');
		$pdf->Ln();
		$pdf->Ln();

		/*
			Running	
			Customer	
			Nama Barang	
			Bahan	
			Warna	
			QTY	
			CT	
			CAV	
			GW	
			NW	
			Kurang Prod.

		*/
		//table 
		//thead
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(20,8,"Runing",1,0,'C');
		$pdf->Cell(21,8,"Cutomer",1,0,'C');
		$pdf->Cell(38,8,"Nama Barang",1,0,'C');
		$pdf->Cell(20,8,"Bahan",1,0,'C');
		$pdf->Cell(21,8,"Warna",1,0,'C');
		$pdf->Cell(15,8,"Qty",1,0,'C');
		$pdf->Cell(10,8,"CT",1,0,'C');
		$pdf->Cell(10,8,"CAV",1,0,'C');
		$pdf->Cell(10,8,"Bruto",1,0,'C');
		$pdf->Cell(10,8,"Netto",1,0,'C');
		$pdf->Cell(15,8,"Kurang",1,0,'C');
		$pdf->Ln();

		//Tbody

		$pdf->SetFont('Times','',9);
		foreach ($list_production as $prd) {

			//intitialize required info 
			$target_jam     = round(3600/$prd->ct*$prd->cav);
			$target_shift   = $target_jam*8;
			$target_hari    = $target_shift*3;
			$wip_bln_lalu   = $this->produksi_model->get_wip_lalu(    $prd->no_po,  $prd->part_no);
			$wip_bln_ini    = $this->produksi_model->get_wip_bln_ini( $prd->no_po,  $prd->part_no);
			$fg_bln_lalu    = $this->produksi_model->get_fg_lalu(     $prd->no_po,  $prd->part_no);
			$fg_bln_ini     = $this->produksi_model->get_fg_bln_ini(  $prd->no_po,  $prd->part_no);

			$total_wip    	= $wip_bln_ini  + $wip_bln_lalu;
			$total_fg     	= $fg_bln_ini   + $fg_bln_lalu;
			$lama_prod    	= round($prd->blnc_prod/$target_jam);
			$est_selsai 	= date("d M Y",strtotime("+$lama_prod hour"));


			$pdf->Cell(20,6,$prd->status,1,0,'C');
			$pdf->Cell(21,6,$prd->nama_customer,1,0,'C');
			$pdf->Cell(38,6,$prd->nama_barang,1,0,'L');
			$pdf->Cell(20,6,$prd->bahan,1,0,'C');
			$pdf->Cell(21,6,$prd->warna,1,0,'C');
			$pdf->Cell(15,6,$prd->qty,1,0,'C');
			$pdf->Cell(10,6,$prd->ct,1,0,'C');
			$pdf->Cell(10,6,$prd->cav,1,0,'C');
			$pdf->Cell(10,6,$prd->bruto,1,0,'C');
			$pdf->Cell(10,6,$prd->netto,1,0,'C');
			$pdf->Cell(15,6,$prd->blnc_prod<0?'('.abs($prd->blnc_prod).')':$prd->blnc_prod,1,0,'C');
			$pdf->Ln();		
		}



		//render
		$pdf->output();
	}
}
