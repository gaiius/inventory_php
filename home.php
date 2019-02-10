
<?php 
session_start();
include('header.php');
if($_SESSION['status']='1' && isset($_SESSION['username'])){ 
/*echo 'Halo '.$_SESSION['username'];
echo '</br> Anda Login Sebagai '.$_SESSION['level'];
echo '</br> Anda Hanya Bisa Akses Menu di bawah ini';*/

?>

<?php 

include('body.php');?>

<?php 

}else{
	echo ("<script type ='text/javascript'> alert ('User Anda Tidak Aktif ');document.location='javascript:history.back(1)';
		</script>");
}
include('footer.php');
?>
