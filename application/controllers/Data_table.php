<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_table extends CI_Controller {

	public function master_barang()
	{
		$table = 'master_barang';
 
		// Table's primary key
		$primaryKey = 'id';
		 
		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case object
		// parameter names
		$columns = array(
						array("db"=>"id", "dt"=>"id"),
						array("db"=>"nama_customer_m", "dt"=>"nama_customer_m"),
						array("db"=>"kode_customer", "dt"=>"kode_customer"),
						array("db"=>"kode_barang", "dt"=>"kode_barang"),
						array("db"=>"no_urut", "dt"=>"no_urut"),
						array("db"=>"part_no", "dt"=>"part_no"),
						array("db"=>"nama_barang", "dt"=>"nama_barang"),
						array("db"=>"ct", "dt"=>"ct"),
						array("db"=>"cav", "dt"=>"cav"),
						array("db"=>"bruto", "dt"=>"bruto"),
						array("db"=>"netto", "dt"=>"netto"),
						array("db"=>"warna", "dt"=>"warna"),
						array("db"=>"bahan", "dt"=>"bahan"),
						array("db"=>"komposisi_1", "dt"=>"komposisi_1"),
						array("db"=>"komposisi_2", "dt"=>"komposisi_2"),
						array("db"=>"total_mb_name", "dt"=>"total_mb_name"),
						array("db"=>"total_mb_val", "dt"=>"total_mb_val"),
						array("db"=>"mb_1_name", "dt"=>"mb_1_name"),
						array("db"=>"mb_1_val", "dt"=>"mb_1_val"),
						array("db"=>"mb_2_name", "dt"=>"mb_2_name"),
						array("db"=>"mb_2_val", "dt"=>"mb_2_val")
				);
		 
		// SQL server connection information
		$sql_details = array(
		    'user' => 'irpan',
		    'pass' => 'password',
		    'db'   => 'atari_db',
		    'host' => 'localhost'
		);
		 
		require('./assets/DataTables/server-side/ssp.class.php');
		 
		echo json_encode(
		    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
		);

	}

	public function po_table()
	{	
		$this->load->view('admin/template/header',['title'=>"Input PO"]);
		$this->load->view('admin/template/sidebar');
		$this->load->view('server');
		$this->load->view('admin/template/footer');
	}

}