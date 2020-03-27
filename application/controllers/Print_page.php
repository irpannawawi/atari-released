<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_page extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
		empty($this->session->role)?redirect('auth'):'';
    }

	public function index($po='PO',$plc='AT',$m=01,$y=20,$num=000)
	{
		//=====get data
		$po = "$po/$plc/$m/$y/$num"; //$this->input->post('no_po');
		
		$result_po = $this->po_model->get_By_no($po);
		$res = $result_po->result()[0];
		//fill table 
		$list_po = $this->po_model->get_By_no($po);
		$list_po =$list_po->result();


		$pdf = new FPDF();
		$pdf->AddPage('L','F4',0);
		$pdf->SetFont('Times','B',17);
		//Outline / Page Border
		$pdf->Rect(7,7,316,195);

		//header
		$pdf->Cell(80,30,$pdf->Image(base_url('assets/img/'.'logoAtari.jpeg'),10,10,80),1);
		$pdf->Cell((310-80),30,"Order Porduksi",1,0,'C');
		$pdf->Ln();

		//PO info
		$pdf->SetFont('Times','',11);
		$pdf->Cell(35,8,"Cutomer",0);
		$pdf->Cell(50,8," : ".$res->nama_customer,0);
		$pdf->Ln();

		$pdf->Cell(35,8,"Delivery",0);
		$pdf->Cell(50,8," : "."",0);
		$pdf->Ln();

		$pdf->Cell(35,8,"Customer #PO",0);
		$pdf->Cell(50,8," : ".$res->no_po_customer,0);
		$pdf->Ln();

		$pdf->Cell(35,8,"#PO",0);
		$pdf->Cell(50,8," : ".$res->no_po,0);
		$pdf->Ln();
		$pdf->Ln();
		

		$pdf->SetFont('Times','B',10);
		//Table
		$pdf->Cell(221.4286,8,"Product Information",1);
		$pdf->Cell(88.57143,8,"Required Material",1,0,'C');
		$pdf->Ln();
		
		//thead
		$pdf->Cell(21.48571429,8,"Part No",1,0,'C');
		$pdf->Cell(61.97142857,8,"Part Name",1,0,'C');
		$pdf->Cell(14,8,"Po Qty",1,0,'C');
		$pdf->Cell(23.48571429,8,"Part Color",1,0,'C');
		$pdf->Cell(22.48571429,8,"Material",1,0,'C');
		$pdf->Cell(30,8,"Master Batch",1,0,'C');
		$pdf->Cell(10,8,"CT",1,0,'C');
		$pdf->Cell(10,8,"CAV",1,0,'C');
		$pdf->Cell(14,8,"Brutto",1,0,'C');
		$pdf->Cell(14,8,"Netto",1,0,'C');
		$pdf->Cell(21.14285714,8,"Material 1",1,0,'C');
		$pdf->Cell(21.14285714,8,"Material 2",1,0,'C');
		$pdf->Cell(25.14285714,8,"Total Material",1,0,'C');
		$pdf->Cell(21.14285714,8,"Total MB",1,0,'C');
		$pdf->Ln();
		//data list from db
		$pdf->SetFont('Times','',9);
		$grand_total_material1 = $grand_total_material2 = $grand_total_material = $grand_total_MB = 0;
	foreach ($list_po as $key) {
		$pdf->Cell(21.48571429,5,$key->part_no,1,0,'C');
		$pdf->Cell(61.97142857,5,$key->nama_barang,1,0,'L');
		$pdf->Cell(14,5,$key->qty,1,0,'C');
		$pdf->Cell(23.48571429,5,$key->warna,1,0,'C');
		$pdf->Cell(22.48571429,5,$key->bahan,1,0,'C');
		$pdf->Cell(30,5,$key->total_mb_name,1,0,'C');
		$pdf->Cell(10,5,$key->ct,1,0,'C');
		$pdf->Cell(10,5,$key->cav,1,0,'C');
		$pdf->Cell(14,5,$key->bruto,1,0,'C');
		$pdf->Cell(14,5,$key->netto,1,0,'C');
		$pdf->Cell(21.14285714,5,$key->keb_m1.' Kg',1,0,'C');
		$pdf->Cell(21.14285714,5,$key->keb_m2.' Kg',1,0,'C');
		$pdf->Cell(25.14285714,5,$key->keb_total_m.' Kg',1,0,'C');
		$pdf->Cell(21.14285714,5,$key->keb_mb.' Gram',1,0,'C');
		$pdf->Ln();

		//grand total count
		$grand_total_material1 	+= $key->keb_m1;
		$grand_total_material2 	+=  $key->keb_m2;
		$grand_total_material 	+= $key->keb_total_m;
		$grand_total_MB 		+= $key->keb_mb;
	}


		$pdf->Cell(221.4286,5,'Grand Total',1,0,'C');
		$pdf->Cell(21.14285714,5,$grand_total_material1.' Kg',1,0,'C');
		$pdf->Cell(21.14285714,5,$grand_total_material2.' Kg',1,0,'C');
		$pdf->Cell(25.14285714,5,$grand_total_material.' Kg',1,0,'C');
		$pdf->Cell(21.14285714,5,$grand_total_MB.' Gram',1,0,'C');
		$pdf->Ln();

		$pdf->Cell(310,20,'');
		$pdf->Ln();
		//Sign Section
		$pdf->SetFont('Times','',11);
		$pdf->cell(77.5, 5, 'Acknowledge,',0,0,'C');
		$pdf->cell(77.5, 5, 'Approved By,',0,0,'C');
		$pdf->cell(77.5, 5, 'Recived By,',0,0,'C');
		$pdf->cell(77.5, 5, 'Bandung, '.date('d F Y') ,0,0,'C');
		$pdf->Ln();
		$pdf->cell(77.5,5,'',0,0,'C');
		$pdf->cell(77.5,5,'',0,0,'C');
		$pdf->cell(77.5,5,'',0,0,'C');
		$pdf->cell(77.5,5,'Prepared By,',0,0,'C');
		$pdf->Ln();
		$pdf->cell(77.5, 30, '(                         )',0,0,'C');
		$pdf->cell(77.5, 30, '(                         )',0,0,'C');
		$pdf->cell(77.5, 30, '(                         )',0,0,'C');
		$pdf->cell(77.5, 30, '(                         )',0,0,'C');
		$pdf->Output();
	}
}