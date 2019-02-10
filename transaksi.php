<?php
include('koneksi.php');

if(isset($_POST['save'])){

$query_header=mysql_query("insert into transaksi_keluar (id_customer,kode_transaksi,tgl_transaksi)
values('".$_POST['id_customer']."',
'".$_POST['kode_transaksi']."',
'".$_POST['tgl_transaksi']."')");
$id_transaksi=mysql_insert_id();
if($query_header){
	$data_barang=$_POST['id_barang'];
	//var_dump($_POST);
	$data_qty=$_POST['qty'];
	$data_harga_jual=$_POST['harga_jual'];
	$data_subtotal=$_POST['subtotal'];
	$grandtotal=0;
	$total_qty=0;
	for($i=0;$i<count($data_barang); $i++){
		
		if($data_barang[$i]!=''){
			$barang=$data_barang[$i];
		
			$qty=$data_qty[$i];
			$harga_jual=$data_harga_jual[$i];
			$subtotal=$data_subtotal[$i];
			$query_detail="insert into transaksi_detail_keluar(id_transaksi_keluar,id_barang,qty,harga_jual,subtotal)
			values('$id_transaksi','$barang','$qty','$harga_jual','$subtotal')";
			$test=mysql_query($query_detail);
			$total_qty+=$qty;
			$b=mysql_query("update barang SET qty=qty-" . $qty. " WHERE id_barang='" . $barang . "'");
			if($test){
				echo 'ok';
			}else{
				echo mysql_error();
			}
		}
	}
	$q=mysql_query("update transaksi_keluar set qty_total='$total_qty' where id_transaksi_keluar='$id_transaksi'");
}else{
	ECHO mysql_error();
}
}
include('header.php');
?>
<form method="post">
<table border="1" class="table table-bordered">
		<tr>
			<td>Kode Transaksi</td>
			<td><input type="text" name="kode_transaksi"></td>
		</tr>
		
<tr>
			<td>Customer</td>
			<td><select name="id_customer">
			<option value="">--pilih Customer -- </option>
			<?php $cs=mysql_query("select * from customer");
				while ($data=mysql_fetch_array($cs)) { ?>
				<option value="<?php echo $data['id_customer'];?>"><?php echo $data['nama'];?></option>
				<?php }?>
			</select>
			</td>
		</tr>
           <tr>
			<td>Tanggal Transaksi</td>
			<td><input type="date" name="tgl_transaksi"></td>
		</tr>
		
</table>
</br>
<table border="1" class="table table-bordered">
	<tr>
		<td>Nama Barang</td>
		<td>Qty</td>
		<td>Harga Jual</td>
		<td>Subtotal</td>
	</tr>
	<?php
	for($i=1; $i <= 6; $i++) { ?>
<tr>
	<td><select id='id_barang_<?php echo $i;?>' name="id_barang[]" class="form-control">
	<option value="">--pilih Barang -- </option>
			<?php $cs=mysql_query("select * from barang");
				while ($data=mysql_fetch_array($cs)) { ?>
				<option value="<?php echo $data['id_barang'];?>"><?php echo $data['nama_barang'];?></option>
				<?php }?>
			</select></td>
	<td><input type="text" id="qty_<?php echo $i;?>" name="qty[]" class="form-control"></td>
	<td><input type="text" id="harga_<?php echo $i;?>"name="harga_jual[]" class="form-control"></td>
	<td><input type="text" id="subtotal_<?php echo $i;?>"name="subtotal[]" class="form-control subtotal"></td>
	</tr>
	<script>
    $(document).ready(function(e) {
	          $("#id_barang_<?php echo $i; ?>").click(function () {
                        var id_barang = $("#id_barang_<?php echo $i; ?>").val();
                        $.ajax({
                            url: "get_barang.php",
                            data: "id_barang=" + id_barang,
                            success: function (value) {
                                var data = value.split(",");
                                $("#harga_<?php echo $i; ?>").val(data[0]);
                                var price = Number($("#harga_<?php echo $i; ?>").val(data[0]));
                                var qty = Number($("#qty_<?php echo $i; ?>").val())
                                var sub = Number(price) * qty;
                                $("#subtotal_<?php echo $i; ?>").val(sub);
                                sumAll();
                            }

                        });

                    });
					$("#qty_<?php echo $i; ?>").blur(function(){
						var qty=$(this).val();
						var price=$("#harga_<?php echo $i; ?>").val();
						var sub=qty*price;
						console.log(sub);
						$("#subtotal_<?php echo $i; ?>").val(sub);
						sumAll();
					});
					function sumAll(){
						var tot=0;
						$(".subtotal").each(function () {
							var v= Number($(this).val());
							tot+=v;
							console.log(v);
							$("#tot").val(tot);
						});
					}
	});
		
		   </script>
	<?php 
	
	
	
	} ?>
	<tr>
	<td>Total</td>
	<td><input type="text" id="tot" ></td>
	</tr>
	<tr>
		<td><input type="submit" name="save"></td>
		</tr>
	</table>
	
<?php
include('footer.php');?>
