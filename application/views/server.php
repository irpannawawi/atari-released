<div class="card">
	<div class="card-body">
		<table id="sampleTable">
			<thead class="thead-dark">
     					<tr>
		 					<th class="text-center" rowspan="2">No</th>
		 					<th class="text-center" colspan="5">Customer</th>
		 					<th class="text-center" rowspan="2">Barang</th>
		 					<th class="text-center" colspan="4">Gramasi</th>
		 					<th class="text-center" rowspan="2">Warna</th>
		 					<th class="text-center" rowspan="2">Bahan</th>
		 					<th class="text-center" colspan="2">Komposisi</th>
		 					<th class="text-center" colspan="2" nowrap>Total MB</th>
		 					<th class="text-center" colspan="5" nowrap>Master Batch</th>
		 				</tr>
		 				<tr>
		 					<!-- Customer -->
		 					<th align="center" nowrap>Nama Customer</th>
		 					<th align="center" nowrap>Kode</th>
		 					<th align="center" nowrap>No Item</th>
		 					<th align="center" nowrap>No Urut</th>
		 					<th align="center" nowrap>Part No</th>
		 					<!-- ./Customer -->


		 					<!-- Gramasi -->
		 					<th align="center">CT</th>
		 					<th align="center">CAV</th>
		 					<th align="center">Bruto</th>
		 					<th align="center">Netto</th>
		 					<!-- ./Gramasi -->

		 					<!-- KOMPOSISI -->
		 					<th align="center">1</th>
		 					<th align="center">2</th>
		 					<!-- ./KOMPOSISI -->

		 					<!-- TOTAL MB -->
		 					<th align="center">Name</th>
		 					<th align="center">Value</th>
		 					<!-- ./TOTAL MB -->

		 					<!-- MASTER BATCH -->
		 					<th align="center" nowrap>MB 1</th>
		 					<th align="center">%</th>
		 					<th align="center" nowrap>MB 2</th>
		 					<th align="center">%</th>
		 					<!-- ./MASTER BATCH -->
		 					<th>Aksi</th>
		 					
		 				</tr>
     				</thead>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
    	$('#sampleTable').DataTable({
	        "processing": true,
	        "serverSide": true,
	        "ajax": {
	            "url": "<?=site_url('data_table/master_barang')?>",
	            "type": "POST"
        	},
	        "columns": [
	            { "data"	: "id" },
				{ "data"	: "nama_customer_m"},
				{ "data"	: "kode_customer"},
				{ "data"	: "kode_barang"},
				{ "data"	: "no_urut"},
				{ "data"	: "part_no"},
				{ "data"	: "nama_barang"},
				{ "data"	: "ct"},
				{ "data"	: "cav"},
				{ "data"	: "bruto"},
				{ "data"	: "netto"},
				{ "data"	: "warna"},
				{ "data"	: "bahan"},
				{ "data"	: "komposisi_1"},
				{ "data"	: "komposisi_2"},
				{ "data"	: "total_mb_name"},
				{ "data"	: "total_mb_val"},
				{ "data"	: "mb_1_name"},
				{ "data"	: "mb_1_val"},
				{ "data"	: "mb_2_name"},
				{ "data"	: "mb_2_val"}
	        ]
    	});
    });
</script>