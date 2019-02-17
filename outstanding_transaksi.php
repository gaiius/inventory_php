<?php 
include('koneksi.php');
?>
<?php
include('header.php');?>
<table method="" class="table table-bordered">
	<tr>
		<td>id_customer</td>
		<td>kode_transaksi</td>
		
		<td>qty_total</td>
		<td>grand_total</td>
		<td>status_transaksi</td>
		<td>status_user</td>
		</tr>

<?php 
$q=mysql_query("select * from transaksi_keluar where status_transaksi=0 and status_user=1");
while($d=mysql_fetch_array($q)) {?>
		<tr>
				<td><?php echo $d['id_customer'];?></td>
				<td><?php echo $d['kode_transaksi'];?></td>
				<td><?php echo $d['tgl_transaksi'];?></td>
				<td><?php echo $d['grand_total'];?></td>
				<td><?php 
				if($d['status_transaksi']=='0'){
					echo 'Create Transaksi';
				}elseif($d['status_transaksi']=='1'){
					echo 'Create Surat Jalan';
				}elseif($d['status_transaksi']=='2'){
					echo 'Create Invoice';
				}else{
					echo 'Complite';
				}?></td>
				<td><?php if($d['status_user']=='0'){
					Echo 'Non Approve';
				}elseif($d['status_user']=='1'){
					Echo 'Approve';
				};?></td>
		</tr>
<?php } ?>

		

</table>
<?php
include('footer.php');?>