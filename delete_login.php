<?php 
include('koneksi.php');
$query_delet=mysql_query("delete from login where id_login='".$_GET['id_login']."'");
if($query_delet){
	header("location:view_login.php");
}else{
	echo mysql_error();
}