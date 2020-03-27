<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		empty($this->session->role)?redirect('auth'):'';
	}
	
	public function input()
	{
		//benchmark
		$this->benchmark->mark('start');
		//benchmark 

		$list_produksi = $this->produksi_model->get_all_production();
		$data['list_produksi'] = $list_produksi->result();

		$list_mesin = $this->master_mesin->get_mesin();
		$data['list_mesin'] = $list_mesin;

		$list_operator = $this->master_operator->get_all_operator();
		$data['list_operator'] = $list_operator->result();

		//benchmark
		$this->benchmark->mark('data_loaded');
		//benchmark

		$this->load->view('admin/template/header',['title'=>'Atari Plastic | Input Harian']);
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/produksi/input_produksi',$data);
		$this->load->view('admin/template/footer');
		
		//benchmark
		$this->benchmark->mark('end_load');
		//benchmark

		$full_time = $this->benchmark->elapsed_time('start', 'end_load');
		$starttodata = $this->benchmark->elapsed_time('start','data_loaded');
		$page = $this->benchmark->elapsed_time('data_loaded','end_load');

		echo "<script>console.log('data loading: $starttodata, page loading : $page, Total : $full_time')</script>";
	}

	public function daily_input()
	{
		$data['no_po']	    	= $this->input->post('no_po'); 
		$data['part_no']   		= $this->input->post('part_no'); 
		$data['id_operator']  	= $this->input->post('operator');
		//$data['nama_operator']	= $this->input->post('nama_operator');
		$data['daily_ct']       = $this->input->post('ct');
		$data['daily_cav']      = $this->input->post('cav');
		$data['daily_bruto']    = $this->input->post('bruto');
		$data['daily_netto']    = $this->input->post('netto'); 
		$data['fg']        		= $this->input->post('fg');
		$data['wip']       		= $this->input->post('wip');
		$data['short_m']   		= $this->input->post('short_m');
		$data['silver']    		= $this->input->post('silver');
		$data['black_dot'] 		= $this->input->post('black_dot');
		$data['bubble']    		= $this->input->post('bubble');
		$data['f_mark']    		= $this->input->post('f_mark');
		$data['discolor']  		= $this->input->post('discolor');
		$data['flashing']  		= $this->input->post('flashing');
		$data['crack']     		= $this->input->post('crack');
		$data['s_mark']			= $this->input->post('s_mark');
		$data['under_over_cut'] = $this->input->post('under_over_cut');
		$data['lain_lain']		= $this->input->post('lain_lain');
		$data['ng_total']		= $this->input->post('ng_total');
		$data['bahan_keluar']	= $this->input->post('bahan_keluar');
		$data['gilingan']		= $this->input->post('gilingan');
		$data['no_sj']		    = $this->input->post('no_sj');
		$data['qty_kirim']		= $this->input->post('qty_kirim');
		$data['shift']			= $this->input->post('shift'); 
		$data['tanggal_input'] 	= $this->input->post('tanggal_input');


		$res = $this->produksi_model->insert_daily($data);
		// update blnc prod proccess

		//get
		$no_po = $data['no_po'];
		$part_no = $data['part_no'];
		$res = $this->produksi_model->get_production($no_po, $part_no)->result()[0];
		
		$wip_bln_lalu   = $this->produksi_model->get_wip_lalu(    $res->no_po,  $res->part_no);
		$wip_bln_ini    = $this->produksi_model->get_wip_bln_ini( $res->no_po,  $res->part_no);
	    $fg_bln_lalu    = $this->produksi_model->get_fg_lalu(     $res->no_po,  $res->part_no);
	    $fg_bln_ini     = $this->produksi_model->get_fg_bln_ini(  $res->no_po,  $res->part_no);

		$total_wip  = $wip_bln_ini + $wip_bln_lalu;
        $total_fg 	= $fg_bln_ini + $fg_bln_lalu;
		$blnc_prod 	= $res->qty - $total_fg - $total_wip;
		//update
		$this->produksi_model->update_blnc($no_po, $part_no, $blnc_prod);

	}

	public function change_status($status)
	{
		$id_production = $this->input->post('id');
		$res = $this->produksi_model->set_status($status, $id_production);

		if ($res) {
			echo "OK";
		}else{
			print_r($this->db->error());
		}
	}

	public function change_machine($id_production)
	{	
		$no_mesin = $this->input->post('no_mesin');
		$res = $this->produksi_model->set_machine($no_mesin,$id_production);
		if ($res) {
			echo "OK";
		}else{
			echo "False";
		}
	}
}
