<?php include 'function.php';
session_start();
// if (!isset($_SESSION['user'])) {
// 	echo "<script>window.location='login.php';</script>";
// }
if (isset($_SESSION['user']) && !isset($_SESSION['restaurant'])) 
{
	$obj = new DB_con();
	
	$ordersArray = $_POST['ordersArray'];
	foreach ($ordersArray as  $array) {

		$params['rest_id'] = $array['R_ID'];
		$params['food_id'] = $array['F_ID'];
		$params['quantity'] = $array[6];
		$params['user_id'] = $_SESSION['user']['id'];
		$params['order_date'] = date("Y-m-d");
		$result = $obj->insert_order_details($params);
	}
	if ($result == 'success') 
	{
		unset($_SESSION['cart']);
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