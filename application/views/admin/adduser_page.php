<?php require 'template/header.php'; ?>
<?php require 'template/sidebar.php'; ?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Users</a></li>
              <li class="breadcrumb-item active">Registration</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->








<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  </script>

<section>
	<div class="row">
		
		<div class="col-4" style="margin-left: 20px;">
		<?=!empty($_SESSION['status'])?"<div class=\"alert alert-warning\">".$_SESSION['status']."</div>":''?>
<?=form_open('user/add')?>
			<input type="text" name="username" placeholder="Username" class="form-control">
			<input type="text" name="email" placeholder="Email" class="form-control">
			<select name="role" class="form-control">
				<option>----LEVEL----</option>
		<option value="DEFAULT">Default</option>
		<option value="ADMIN">Admin</option>
	</select>
			<input type="text" name="password" placeholder="Password" class="form-control" autocomplete="OFF">
			
		<input type="submit" name="submit" value="Input" class="btn btn-primary">
		<?=form_close()?>

		</div>
	</div>
</section>

		

	
<?php require 'template/footer.php'; ?>



