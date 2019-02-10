<?php 
include('koneksi.php');
if(isset($_POST['save'])){
	$cek_pasword=mysql_query("select * from login where id_login='".$_POST['id_login']."'");
	$validasi=mysql_fetch_array($cek_pasword);
	$old_password=$validasi['password'];
	$new_password=$_POST['password'];
	if($old_password != $new_password){
		$password=md5($new_password);		
	}else{

		$password=$old_password;
	}

$query_edit=mysql_query("update login set username='".$_POST['username']."',
password='".$password."',
level='".$_POST['level']."',
status='".$_POST['status']."'
where 
id_login='".$_POST['id_login']."'");
if($query_edit){
	header('location:view_login.php');
}else{
	echo mysql_error();
}
}
include('home.php');
$cari_data=mysql_query("select * from login where id_login ='".$_GET['id_login']."'");
$hasil=mysql_fetch_array($cari_data);
?>
<form method="post">
<input type="hidden" name="id_login" value="<?php echo $hasil['id_login'];?>">
<table border="1" class="table table-bordered">
	<tr>
		<th>Nama</th>
		<th><input type="text" name="username" class="form-control"value="<?php echo $hasil['username'];?>"></th>
	</tr>
	<tr>
 		<th>Password</th>
		<th><input type="password" name="password" class="form-control" value="<?php echo $hasil['password'];?>"></th>
	</tr>
	<tr>
		<th>Level</th>
	<th><select name="level" class="form-control">
			<option value="">--Pilih Level--</option>
			<option value="Admin">Admin</option>
			<option value="Manager">Manager</option>
			<option value="Supervisor">Supervisor</option>
		</select></th>
		</tr>
		<tr>
		
		<th>Status</th>
		<th><select name="status" class="form-control">
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