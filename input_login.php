<?php 
include('koneksi.php');
if(isset($_POST['save'])){
	$md5=md5($_POST['password']);
$query_input=mysql_query("insert into login(username,password,level,status)
values('".$_POST['username']."',
'".$md5."',
'".$_POST['level']."',
'".$_POST['status']."')");
if($query_input){
	header("location:tampil_login.php");
}else{
	echo mysql_error();
}
}
include('header.php');
?>
<a href="view_login.php" class="btn btn-danger">Kembali</a>
<form method="post">
<table border="1" class="table table-bordered">
	<tr>
		<th>Nama</th>
		<th><input type="text" class="form-control" name="username" required></th>
	</tr>
	<tr>
 		<th>Password</th>
		<th><input type="password"  class="form-control" name="password" maxlength="3" required></th>
	</tr>
	<tr>
		<th>Level</th>
	<th><select name="level">
			<option value="">--Pilih Level--</option>
			<option value="Admin">Admin</option>
			<option value="Manager">Manager</option>
			<option value="Supervisor">Supervisor</option>
		</select></th>
		</tr>
		<tr>
		
		<th>Status</th>
		<th><select name="status">
			<option value="">--Pilih Level--</option>
			<option value="1">Aktif</option>
			<option value="0">Tidak Aktif</option></th>
		</tr>
		<tr>
		<th><input type="submit" name="save" value="Save"></th>
		</tr>
		</table>
		</form>
		<?php 
include('footer.php');
?>