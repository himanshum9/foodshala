<?php include 'function.php';
session_start();
if (isset($_POST)) {
$params = $_POST;
$params['user_id'] = $_SESSION['user']['id'];
$obj = new DB_con();
$sql =$obj->save_restaurant_data($params);
if($sql ="success"){
 	$response['status']='success';
    $response['msg'] ="The data is saved succesfully!!";
    echo json_encode($response);
}
else{
	$response['status']='error';
    $response['msg'] ="Something went wrong,please try again later!!";
    echo json_encode($response);
}
}
