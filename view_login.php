
<?php 
include('koneksi.php');
$query_view="select * from login";
$proses=mysql_query($query_view);
include('header.php');
?>

<a href="input_login.php" class="btn btn-danger">Tambah Data</a>
<table class="table table-bordered">
	<tr>
		<td>Nama</td>
		<td>password</td>
		<td>Level</td>
		<td>Status</td>
		<td colspan="2">Action</td>
	</tr>
<?php 
while ($tampil_data=mysql_fetch_array($proses)) { ?>
		<tr>
		<td><?php echo $tampil_data['username'];?></td>
		<td><?php echo $tampil_data['password'];?></td>
		<td><?php echo $tampil_data['level'];?></td>
		<td><?php echo $tampil_data['status']? 'AKtif' :'TIdak aktif';?></td>
		<td><a href="edit_login.php?id_login=<?php echo $tampil_data['id_login'];?>">Edit</a></td>
		<td><a href="delete_login.php?id_login=<?php echo $tampil_data['id_login'];?>">Hapus</a></td>
		</tr>
<?php }?>
</table>
<button onclick="window.print();">Print</button>
<?php 
include('footer.php');
?>