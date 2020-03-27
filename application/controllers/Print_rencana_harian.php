<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_rencana_harian extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
		empty($this->session->role)?redirect('auth'):'';
    }
    
	public function index()
	{

		//fetching data from db 
		$list_production = $this->produksi_model->get_running_production();
		$list_production =$list_production->result();

		$pdf = new FPDF();
		$pdf->AddPage('L','F4',0);
		$pdf->SetFont('Times','B',17);
		/*
			*Catatan
			Panjang kertas = 310pt
		*/
		
		
		//header
		$pdf->Cell(50,25,$pdf->Image(base_url('assets/img/'.'logoAtari.jpeg'),10,10,80),0);
		$pdf->Cell((310-80),25,"Rencana Harian Produksi",0,0,'C');
		$pdf->Ln();

		//date info

		$pdf->SetFont('Times','',10);
		$pdf->Cell(310,10,"Tanggal : ".date('d/m/Y'),0,0,'L');
		$pdf->Ln();
		//table 
		//thead
		$pdf->SetFont('Times','B',10);
		$pdf->Cell(20,8,"Mesin/Ton",1,0,'C');
		$pdf->Cell(45,8,"Nama Barang",1,0,'C');
		$pdf->Cell(17,8,"Warna",1,0,'C');
		$pdf->Cell(27,8,"Bahan",1,0,'C');
		$pdf->Cell(21,8,"Po Qty",1,0,'C');
		$pdf->Cell(10,8,"CT",1,0,'C');
		$pdf->Cell(10,8,"CAV",1,0,'C');
		$pdf->Cell(14,8,"Brutto",1,0,'C');
		$pdf->Cell(14,8,"Netto",1,0,'C');
		$pdf->Cell(30,8,"Target/Shift",1,0,'C');
		$pdf->Cell(21,8,"Target/Hari",1,0,'C');
		$pdf->Cell(21,8,"Lama Prod.",1,0,'C');
		$pdf->Cell(19,8,"Keb. Bahan",1,0,'C');
		$pdf->Cell(21,8,"Est. Selsai",1,0,'C');
		$pdf->Cell(21,8,"Keterangan",1,0,'C');
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


			$pdf->Cell(10,8,$prd->no_mesin,1,0,'C');
			$pdf->Cell(10,8,$prd->tonase,1,0,'C');
			$pdf->Cell(45,8,$prd->nama_barang,1,0,'L');
			$pdf->Cell(17,8,$prd->warna,1,0,'C');
			$pdf->Cell(27,8,$prd->bahan,1,0,'C');
			$pdf->Cell(21,8,$prd->qty,1,0,'C');
			$pdf->Cell(10,8,$prd->ct,1,0,'C');
			$pdf->Cell(10,8,$prd->cav,1,0,'C');
			$pdf->Cell(14,8,$prd->bruto,1,0,'C');
			$pdf->Cell(14,8,$prd->netto,1,0,'C');
			$pdf->Cell(30,8,$target_shift,1,0,'C');
			$pdf->Cell(21,8,$target_hari,1,0,'C');
			$pdf->Cell(21,8,$lama_prod<=0?'-':$lama_prod." Jam",1,0,'C');
			$pdf->Cell(19,8,$prd->keb_total_m,1,0,'C');
			$prd->blnc_prod<0?'('.abs($prd->blnc_prod).')':$prd->blnc_prod;
			$pdf->Cell(21,8,$est_selsai,1,0,'C');
			$pdf->Cell(21,8,'',1,0,'C');
			$pdf->Ln();		
		}



		//render
		$pdf->output();
	}
}
