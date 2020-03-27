<?php 
	function color_picker($color)
	{
		switch ($color) {
			case 'light blue':
				return "#99CCFF";
				break;
			case 'Pink Lilin':
				return "#FE1A81";
				break;
			case 'Hijau Hino':
				return "#00B050";
				break;
			case 'Violet Lilin':
				return "#7030A0";
				break;
			case 'Biru Langit Floring':
				return "#06A9CA";
				break;
			case 'Hijau Lilin':
				return "#99FF33";
				break;
			case 'Pink Tongtol':
				return "#FF3399";
				break;
			case 'Kuning Stabilo':
				return "#FF6600; color: #ffff";
				break;
			case 'Biru Proses':
				return "#0070C0";
				break;
			case 'Hijau Proses':
				return "#548235";
				break;
			case 'Hitam':
				return "#000; color: #ffff";
				break;
			case 'Merah Pupuk':
				return "#FF0000";
				break;
			default:
				# code...
				break;
		}
	}
?>

<script type="text/javascript">
		function search_kd_barang()
		{
			kd_cust = $('#kode_customer')

			url = "<?=site_url('base_barang/search_kd_barang');?>"
			data_post = {
				kode_customer:kd_cust.val()
			}
			$.post(url,data_post,function(data){
				data = JSON.parse(data);
				$('#kode_barang').val(data.last_data);
				$('#no_urut').val(data.num_rows);

			})
		}

		function start_no_urut()
		{
			$('#no_urut').val('')
		}

</script>
	    		
<script>
  $( function() {
    var availableTags = <?=json_encode($list_warna)?>;
    $( "#warna" ).autocomplete({
      source: availableTags
    });
  } );
</script>
<aside class="content">
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Base</a></li>
              <li class="breadcrumb-item active">Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
     <div class="card">
     	<div class="card-header">
     		<h2 style="float: left;">List Barang</h2>
     		<button 
     			class="btn btn-primary btn-sm" 
     			style="float: right;" 
     			type="button"
     			data-toggle="modal"
     			data-target="#add_new_modal"
     		>
     				<i class="fa fa-plus"></i>Tambah
     		</button>
     	</div>
     	<div class="card-body">
     		<div class="col-12 table-responsive" id="table_list_barang" style="margin: 0px auto;">
     			<table id="master_barang"  class="table table-bordered table-striped table-hover table-responsive">
     				<thead class="thead-dark">
     					<tr>
		 					<th rowspan="2">Aksi</th>
		 					<th class="text-center" rowspan="2">No</th>
		 					<th class="text-center" colspan="5">Customer</th>
		 					<th class="text-center" rowspan="2" >Barang</th>
		 					<th class="text-center" colspan="4">Gramasi</th>
		 					<th class="text-center" rowspan="2">Warna</th>
		 					<th class="text-center" rowspan="2">Bahan</th>
		 					<th class="text-center" colspan="2">Komposisi</th>
		 					<th class="text-center" colspan="2" nowrap>Total MB</th>
		 					<th class="text-center" colspan="4" nowrap>Master Batch</th>
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
		 				</tr>
     				</thead>
     				
     			</table>
     		</div>
     	</div>
     	<div class="card-footer">
     		
     	</div>
     </div>
    </section>
</div>
</aside>

<!--===========================MODALS HERE+====================================-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_new_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?=form_open('base_barang/add_new')?>
	    <h3><u>Kode Barang</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="kode_customer">Kode Customer</label>
	    		<input class="form-control bg-form-grey" type="text" id="kode_customer" name="kode_customer" onKeyUp="search_kd_barang()"  required/>
	    	</div>
	    	<div class="form-group col">
	    		<label for="kode_barang">Kode Barang</label>
	    		<input class="form-control bg-form-grey" type="text" id="kode_barang" name="kode_barang" onclick="start_no_urut()"  required/>
	    	</div>
	    	<div class="form-group col">
	    		<label for="no_urut">No Urut</label>
	    		<input class="form-control bg-form-grey" type="text" id="no_urut" name="no_urut" required/>
	    	</div>
	    </div>

	 
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="nama_customer_m">Nama Custommer</label>
	    		<input class="form-control bg-form-grey" type="text" name="nama_customer_m" required/>
	    	</div>
	    </div><div class="row">
	    	<div class="form-group col">
	    		<label for="nama_barang">Nama Barang</label>
	    		<input class="form-control bg-form-grey" type="text" name="nama_barang" required/>
	    	</div>
	    </div>

	    <h3><u>Gramasi</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="ct">CT</label>
	    		<input class="form-control bg-form-grey" type="text" name="ct" required/>
	    	</div>
	    	<div class="form-group col">
	    		<label for="cav">CAV</label>
	    		<input class="form-control bg-form-grey" type="text" name="cav"  required/>
	    	</div>
	    	<div class="form-group col">
	    		<label for="bruto">Bruto</label>
	    		<input class="form-control bg-form-grey" type="text" name="bruto"  required/>
	    	</div>
	    	<div class="form-group col">
	    		<label for="netto">Netto</label>
	    		<input class="form-control bg-form-grey" type="text" name="netto"  required/>
	    	</div>
	    </div>

	    	
	    <div class="row">
	    	<div class="form-group col">

	    		<label for="warna">Warna</label>
	    		<input class="form-control bg-form-grey" type="text" name="warna"   required/>
	    	</div>
	    </div>

	    <div class="row">
	    	<div class="form-group col">
	    		<label for="bahan">Bahan</label>
	    		<input class="form-control bg-form-grey" type="text" name="bahan"  required/>
	    	</div>
	    </div>

	    <h3><u>Komposisi</u></h3>
	    <div class="row" >
	    	<div class="form-group col">
	    		<label for="komposisi-1">Komposisi 1</label>
	    		<input class="form-control bg-form-grey" type="text" name="komposisi_1"  required/>
	    	</div>
	    	<div class="form-group col">
	    		<label for="komposisi-2">Komposisi 2</label>
	    		<input class="form-control bg-form-grey" type="text" name="komposisi_2" />
	    	</div>
	    </div>
	    
	    <h3><u>Master Batch</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="mb-1-name">Mb 1</label>
	    		<input class="form-control bg-form-grey" type="text" name="mb_1_name" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="mb-1-val">%</label>
	    		<input class="form-control bg-form-grey" type="text" name="mb_1_val" />
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="mb-2-name">Mb 2</label>
	    		<input class="form-control bg-form-grey" type="text" name="mb_2_name" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="mb-2-val">%</label>
	    		<input class="form-control bg-form-grey" type="text" name="mb_2_val" />
	    	</div>
	    </div> 

	    <h3><u>Toatal Master Batch</u></h3>
	    <div class="row">
	    	<div class="form-group col">
	    		<label for="total-mb-name">MB</label>
	    		<input class="form-control bg-form-grey" type="text" name="total_mb_name" />
	    	</div>
	    	<div class="form-group col">
	    		<label for="total-mb-val">%</label>
	    		<input class="form-control bg-form-grey" type="text" name="total_mb_val" />
	    	</div>
	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>

<!--===========================edit modal===================================-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
        	<div class="form-group">
        		<label for="edit_no_mesin">No Mesin</label>
        		<input type="text" id="edit_no_mesin" class="form-control" placeholder="No Mesin" />
        		<input type="text" id="edit_id_mesin" hidden />
        	</div>
        	<div class="form-group">
        		<label for="edit_nama_mesin">Brand</label>
        		<input type="text" id="edit_nama_mesin" class="form-control" placeholder="Brand" />
        	</div>
        	<div class="form-group">
        		<label for="edit_tonase">Tonase</label>
        		<input type="text" id="edit_tonase" class="form-control" placeholder="Tonase" />
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="save_edited_mesin" data-dismiss="modal" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!--===========================MODALS END+====================================-->

<!--JAVASCRIPTS-->


<script type="text/javascript">
    var tbl = $('#master_barang').DataTable({
	        "processing": true,
	        "serverSide": true,
	        "ajax": {
	            "url": "<?=site_url('data_table/master_barang')?>",
	            "type": "POST"
        	},

        	'columnDefs': [
		        {
		        	 "targets": 0,
		        	 "data":"id",
		        	 "render":function(data){
		        	 	var div_open = '<div class="btn-group">'
		        	 	var delete_link = '<button class="btn btn-danger btn-sm" onclick="delete_barang('+data+')"><i class="fa fa-trash"></i></button>'
		        	 	var edit_link = '<a class="btn btn-primary btn-sm" href="" ><i class="fa fa-edit"></i></a>'
		        	 	var div_close= '</div>'
		        	 	return div_open+delete_link+edit_link+div_close
		        	 }
		         },
		         {
		         	targets:[7], 
		         	class:"nowrap"
		         }
		    ],
 
	        "columns": [
	            { "data"	: "id",  },
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
    


		function refresh_page()
		{
			tbl.ajax.reload();
		}

		$('#save-barang').click(function(){
			var kd_cust   		= $('#kode_customer');
			var kode_barang 	= $('#kode_barang');
			var no_urut 		= $('#no_urut');

			var nama_customer_m = $('#nama_customer_m');
			var nama_barang	= $('#nama_barang');

			var ct 			= $('#ct');
			var cav 		= $('#cav');
			var bruto 		= $('#bruto');
			var netto 		= $('#netto');
			
			var warna 		= $('#warna');
			var bahan 		= $('#bahan');
			
			var komposisi_1 		= $('#komposisi-1');
			var komposisi_2 		= $('#komposisi-2');
			
			var mb_1_name 		= $('#mb-1-name');
			var mb_1_val 		= $('#mb-1-val');


			var mb_2_name 		= $('#mb-2-name');
			var mb_2_val 		= $('#mb-2-val');

			var total_mb_name	= $('#total-mb-name');
			var total_mb_val	= $('#total-mb-val')

			data_list = {
					kd_cust   		: kd_cust.val(),
					kode_barang 	: kode_barang.val(),
					no_urut 		: no_urut.val(),
					nama_customer_m : nama_customer_m.val(),
					nama_barang 	: nama_barang.val(),
					ct 				: ct.val(),
					cav 			: cav.val(),
					bruto 			: bruto.val(),
					netto 			: netto.val(),
					warna 			: warna.val(),
					Bahan 			: bahan.val(),
					komposisi_1 	: komposisi_1.val(),
					komposisi_2 	: komposisi_2.val(),
					mb_1_name 		: mb_1_name.val(),
					mb_1_val 		: mb_1_val.val(),
					mb_2_name 		: mb_2_name.val(),
					mb_2_val 		: mb_2_val.val()
				};
			url = "<?=site_url('base_barang/add_new')?>";
			$.post(url,data_list,function(data){
				console.log(data);
			})
		});

		$('#save_edited_mesin').click(function(){
			var id_mesin 	= $('#edit_id_mesin');
			var nama_mesin 	= $('#edit_nama_mesin');
			var no_mesin 	= $('#edit_no_mesin');
			var tonase	= $('#edit_tonase');

			data = {	id_mesin 	: id_mesin.val(), 
						nama_mesin 	: nama_mesin.val(), 
						no_mesin 	: no_mesin.val(), 
						tonase 		: tonase.val()
					};

			url = "<?=site_url('base_mesin/edit')?>";

			$.post(url,data,function(data){
				id_mesin.val('');
				no_mesin.val('');
				nama_mesin.val('');
				tonase.val('');
				data = JSON.parse(data);
				console.log(data);
				if (data.status == true) {
					refresh_page();
					Swal.fire({
					  title: 'Berhasil!',
					  text: 'Data mesin ditambahakan',
					  icon: 'success',
					  confirmButtonText: 'Ok'
					});
				}
			})
		});

		//delete op
		function delete_barang(id_barang)
		{
			url = "<?=site_url('base_barang/delete')?>";

			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	//deleting
			   	$.post(url,{id_barang : id_barang}, function(data){
				data = JSON.parse(data)
				if (data.status == true ){
					refresh_page();
					Swal.fire(
				      'Deleted!',
				      'Your data has been deleted.',
				      'success'
				    );
				}
			}); 
			  }
			});
		}

		//fill edit 
		function fill_edit(id_mesin,no_mesin, nama_mesin,tonase)
		{
			$('#edit_id_mesin').val(id_mesin);
			$('#edit_no_mesin').val(no_mesin);
			$('#edit_nama_mesin').val(nama_mesin);
			$('#edit_tonase').val(tonase);
		}
	</script>
<!-- ./JAVASCRIPTS-->
<?php if (!empty($_SESSION['message'])) {?>
	<script type="text/javascript">
		toastr.success("<?=$_SESSION['message']?>", 'Berhasil',{timeOut:4000});
	</script>
<?php }else if (!empty($_SESSION['err_message'])){?>
	<script type="text/javascript">
		toastr.error("<?=$_SESSION['err_message']?>", 'Gagal',{timeOut:4000});
	</script>
<?php } ?>