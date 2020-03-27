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
              <li class="breadcrumb-item active">Mesin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
     <div class="card">
     	<div class="card-header">
     		<h2 style="float: left;">List Mesin</h2>
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
     		<div class="col-9 " id="table_list_mesin" style="margin: 0px auto;">
     			<table class="table table-bordered table-striped table-hover">
     				<thead class="thead-dark">
     					<tr>
		 					<th>No</th>
		 					<th>No. Mesin</th>
		 					<th>Brand</th>
		 					<th>Tonase</th>
		 					<th>Action</th>
		 				</tr>
     				</thead>
     				<tbody>
     					<?php $n =0; foreach($list_mesin as $mesin){$n++; ?>
     						<tr>
     							<td align="center">
		 							<?=$n?>
		 						</td>
		 						<td>
		 							<?=$mesin->no_mesin?>
		 						</td>
		 						<td>
		 							<?=$mesin->nama_mesin?>
		 						</td>
		 						<td>
		 							<?=$mesin->tonase?>
		 						</td>
		 						<td align="center" nowrap>
		 							<button 
		 								type="button" 
		 								class="btn btn-warning" 
		 								onclick="fill_edit('<?=$mesin->id_mesin?>','<?=$mesin->no_mesin?>','<?=$mesin->nama_mesin?>','<?=$mesin->tonase?>')"
		 								data-toggle="modal"
		 								data-target="#edit_modal"
		 								>Edit</button>
		 							<button 
		 								type="button" 
		 								class="btn btn-danger" 
		 								onclick="delete_mesin('<?=$mesin->id_mesin?>')"
		 								>Hapus</button>
		 						</td>
     						</tr>
     					<?php } ?>
     				</tbody>
     			</table>
     		</div>
     	</div>
     	<div class="card-footer">
     		
     	</div>
     </div>
    </section>
</div>
</aside>

<!--===========================MODALS GOES HERE+====================================-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_new_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Mesin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
        	<div class="form-group">
        		<input type="text" id="input_no_mesin" class="form-control" placeholder="No Mesin" />
        	</div>
        	<div class="form-group">
        		<input type="text" id="input_nama_mesin" class="form-control" placeholder="Brand" />
        	</div>
        	<div class="form-group">
        		<input type="text" id="input_tonase" class="form-control" placeholder="Tonase" />
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="save_mesin" data-dismiss="modal" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!--===========================edit modal===================================-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Mein</h5>
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
		function refresh_page()
		{
			refresh_table = "<?=site_url('base_mesin/table')?>";
			$.post(refresh_table,function(data){
				$('#table_list_mesin').delay(200).html(data);
			})
		}

		$('#save_mesin').click(function(){
			var no_mesin   	= $('#input_no_mesin');
			var nama_mesin 	= $('#input_nama_mesin');
			var tonase 		= $('#input_tonase');

			data = {
					no_mesin 	:no_mesin.val(), 
					nama_mesin 	:nama_mesin.val(), 
					tonase 		:tonase.val()
				};
			url = "<?=site_url('base_mesin/add_new')?>";

			$.post(url,data,function(data){
				console.log(data);
				no_mesin.val('');
				nama_mesin.val('');
				tonase.val('');

				data = JSON.parse(data);
				
				if (data.status == true) {
					refresh_page();
					Swal.fire({
					  title: 'Berhasil!',
					  text: 'Data mesin ditambahakan',
					  icon: 'success',
					  confirmButtonText: 'Ok'
					});
				}//endif
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
		function delete_mesin(id_mesin)
		{
			url = "<?=site_url('base_mesin/delete')?>";

			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
			  	//deleting
			   	$.post(url,{id_mesin : id_mesin}, function(data){
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
