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
              <li class="breadcrumb-item active">Operator</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
     <div class="card">
     	<div class="card-header">
     		<h2 style="float: left;">List Operator</h2>
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
     		<div class="col-9 " id="table_list_operator" style="margin: 0px auto;">
     			<table class="table table-bordered table-striped table-hover">
     				<thead class="thead-dark">
     					<tr>
		 					<th>No</th>
		 					<th>Nama</th>
		 					<th>Action</th>
		 				</tr>
     				</thead>
     				<tbody>
     					<?php $n =0; foreach($list_operator as $op){$n++; ?>
     						<tr>
     							<td align="center">
		 							<?=$n?>
		 						</td>
		 						<td>
		 							<?=$op->nama_operator?>
		 						</td>
		 						<td align="center" nowrap="">
		 							<button 
		 								type="button" 
		 								class="btn btn-warning" 
		 								onclick="fill_edit('<?=$op->id_operator?>','<?=$op->nama_operator?>')"
		 								data-toggle="modal"
		 								data-target="#edit_modal"
		 								>Edit</button>
		 							<button 
		 								type="button" 
		 								class="btn btn-danger" 
		 								onclick="delete_operator('<?=$op->id_operator?>')"
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
        <h5 class="modal-title">Tambah Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
        	<div class="form-group">
        		<input type="text" id="input_nama_operator" class="form-control" placeholder="Nama Operator" />
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="save_operator" data-dismiss="modal" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!--===========================edit modal===================================-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
        	<div class="form-group">
        		<input type="text" id="edit_nama_operator" class="form-control" placeholder="Nama Operator" />

        		<input type="text" id="edit_id_operator" class="form-control" placeholder="Nama Operator" hidden />
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" id="save_edited_operator" data-dismiss="modal" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!--===========================MODALS END+====================================-->

<!--JAVASCRIPTS-->
	<script type="text/javascript">
		function refresh_page()
		{
			refresh_table = "<?=site_url('base_operator/table')?>";
			$.post(refresh_table,function(data){
				$('#table_list_operator').delay(200).html(data);
			})
		}

		$('#save_operator').click(function(){
			var nama_operator = $('#input_nama_operator');
			data = {nama_operator:nama_operator.val()};
			url = "<?=site_url('base_operator/add_new')?>";
			$.post(url,data,function(data){
				nama_operator.val('');
				data = JSON.parse(data);
				if (data.status == true) {
					refresh_page();
					Swal.fire({
					  title: 'Berhasil!',
					  text: 'Data operator ditambahakan',
					  icon: 'success',
					  confirmButtonText: 'Ok'
					});
				}
			})
		});

		$('#save_edited_operator').click(function(){
			var nama_operator 	= $('#edit_nama_operator');
			var id_operator 	= $('#edit_id_operator');

			data = {id : id_operator.val(), nama_operator:nama_operator.val()};
			url = "<?=site_url('base_operator/edit')?>";

			$.post(url,data,function(data){
				nama_operator.val('');
				id_operator.val('');
				data = JSON.parse(data);
				console.log(data);
				if (data.status == true) {
					refresh_page();
					Swal.fire({
					  title: 'Berhasil!',
					  text: 'Data operator ditambahakan',
					  icon: 'success',
					  confirmButtonText: 'Ok'
					});
				}
			})
		});

		//delete op
		function delete_operator(id_operator)
		{
			url = "<?=site_url('base_operator/delete')?>";

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
			   	$.post(url,{id : id_operator}, function(data){
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
		function fill_edit(id, nama_operator)
		{
			$('#edit_id_operator').val(id);
			$('#edit_nama_operator').val(nama_operator);
		}
	</script>
<!-- ./JAVASCRIPTS-->
