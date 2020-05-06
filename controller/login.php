<?php
session_start();
include_once('function.php');
if(isset($_SESSION['user'])){
header("location: ../shop.php"); 
}
 $obj=new DB_con();
 $params = $_POST;
if ($params['username']=='' || $params['password'] =='') {
	echo json_encode(['code'=>302, 'msg'=>'All fields are mendatory!']);
}
$result = $obj->signin($params);
if (!empty($result)) {
	$_SESSION['user']=$result;
	if ($result['user_role']==2) {
		$restaurant_detail=$obj->get_restaurant_detail_by_id($result['id']);
		$_SESSION['restaurant'] = $restaurant_detail;
	}
	echo json_encode(['code'=>200, 'msg'=>'Login Successfull!!!','role'=>$result['user_role']]);
	}
	else{
		echo json_encode(['code'=>302, 'msg'=>'Invalid username or password']);
	}
