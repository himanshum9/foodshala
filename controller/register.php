<?php
include_once('function.php');
 $obj=new DB_con();
$params = $_POST;

if ($params['username'] =='' || $params['contact']=='' || $params['password']=='') {
	echo json_encode(['code'=>302, 'msg'=>'All Fields are Mendatory']);
	exit();
}
if ($params['user_role']==1) {
	$sql = $obj->register_user($params);
}
if ($params['user_role']==2) {
	$sql = $obj->register_restaurant($params);
}
if ($sql) {
		echo json_encode(['code'=>200, 'msg'=>'Registration Successfull! Please Login.']);
	}
?>