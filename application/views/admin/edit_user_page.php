<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
  } );
  </script>
</head>
<body>
	<h1>Welccome <?=$_SESSION['role']." ".$_SESSION['username']; ?> </h1>
<div>
	<ul>
		<li><a href="<?=site_url('admin/input_barang_masuk')?>">input_barang_masuk</a></li>
		<li><a href="<?=site_url('admin/input_lokasi')?>">input_lokasi</a></li>
		<li><a href="<?=site_url('admin/input_satuan')?>">input_satuan</a></li>
		<li><a href="<?=site_url('admin/barang_masuk')?>">barang_masuk</a></li>
		<li><a href="<?=site_url('admin/barang_keluar')?>">barang_keluar</a></li>
		<li><a href="<?=site_url('admin/profil')?>">profil</a></li>
		<li><a href="<?=site_url('admin/users')?>">users</a></li>
	</ul>
</div>
<h1>Tambah Users</h1>
<?=form_open('user/edit')?>
	username: <input type="text" name="username" value="<?=$user->username?>"><br>
	Email : <input type="email" name="email" value="<?=$user->email?>"><br>
	Role : 
	<select name="role">
		<option value="DEFAULT" <?=$user->role==='DEFAULT'?'selected':'';?> >Default</option>
		<option value="ADMIN" <?=$user->role==='ADMIN'?'selected':'';?> >Admin</option>
	</select><br>
	Password : <input type="text" name="password" value="<?=$user->password?>"><br>

	<input type="text" name="id" value="<?=$user->id_user?>" hidden>
	<input type="submit" name="submit">

<?=form_close()?>


	
</body>
</html>