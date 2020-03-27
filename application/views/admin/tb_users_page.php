<?php require 'template/header.php'; ?>
<?php require 'template/sidebar.php'; ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Users</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




<section>
	<?=!empty($_SESSION['status'])?"<div class=\"alert alert-success\">".$_SESSION['status']."</div>":''?>
	<table border="1" class="table table-bordered table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Role</th>
			<th>Password</th>
			<th>Aksi</th>
		</tr>

		<?php $n =0; foreach($users as $row ){ $n++;?>
			<tr>
				<td><?=$n?></td>
				<td><?=$row->username?></td>
				<td><?=$row->privileges?></td>
				<td>
					<span id="id<?=$n?>">********</span>
					<button class="btn btn-xs btnShow<?=$n?>" onclick="showPassword('<?=$n?>','<?=$row->password?>')">
						<i class="fa fa-eye"></i>
					</button>
					<button hidden class="btn btn-xs btnHide<?=$n?>" onclick="hidePassword('<?=$n?>','<?=$row->password?>')">
						<i class="fa fa-eye-slash"></i>
					</button>
				</td>
				<td>
					<a href="<?=site_url('admin/edit_user/'.$row->id)?>" class="btn btn-warning">Edit</a>
					<a href="<?=site_url('user/delete/'.$row->id)?>" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</section>





	
	





<?php require 'template/footer.php'; ?>

<script type="text/javascript">
	function showPassword(id,pass) {
		$('#id'+id).html(pass)
		$('.btnShow'+id).hide();
		$('.btnHide'+id).removeAttr('hidden');
		$('.btnHide'+id).show();

	}

	function hidePassword(id,pass) {
		$('#id'+id).html('********')
		$('.btnShow'+id).show();
		$('.btnHide'+id).hide();

	}
</script>










