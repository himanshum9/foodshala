<?php include 'function.php';
session_start();
// if (!isset($_SESSION['user'])) {
// 	echo "<script>window.location='login.php';</script>";
// }
if (isset($_SESSION['user']) && !isset($_SESSION['restaurant'])) 
{
	$obj = new DB_con();
	$params['rest_id'] = $_POST['rest_id'];
	$params['food_id'] = $_POST['f_ID'];
	$params['quantity'] = $_POST['quantity'];
	$params['user_id'] = $_SESSION['user']['id'];
	$params['order_date'] = date("Y-m-d");
	$result = $obj->insert_order_details($params);
	if ($result == 'success') 
	{
		$response['status']='success';
        $response['msg'] ="Order Placed Successfully!! Tasty Food Enroute.";
        echo json_encode($response);
	}
	else
	{
		$response['status']='error';
        $response['msg'] ="Something went wrong.Please try again later.";
        echo json_encode($response);
	}
}
else
{
	$response['status']='error';
    $response['msg'] ="Something went wrong.Please try again later.";
    echo json_encode($response);
    
}
?>