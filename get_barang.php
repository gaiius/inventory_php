<?php 
include('koneksi.php');
$id_barang=$_GET['id_barang'];
$query=mysql_query("select * from barang where id_barang='$id_barang'");
$fe=mysql_fetch_array($query);
$harga=$fe['harga'];


echo $harga;

?>