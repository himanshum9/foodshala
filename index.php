<?php include 'header.php';
 include 'controller/function.php';
 if(isset($_SESSION)){
	header('location:shop.php');
 }else{
 header('location:login.php');
}
 ?>