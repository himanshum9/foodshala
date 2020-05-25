<?php include 'function.php';
session_start();
if (!isset($_SESSION['user'])) {
	echo "<script>window.location='login.php';</script>";
}
if ($_POST['action'] =='add' ) {
$id = $_POST['f_ID'];
$items = array(
		$_POST['f_ID'] = array(
		'f_ID' => $_POST['f_ID'],
		'quantity' => $_POST['quantity']
	)
	);
if (isset($_SESSION['user']) && !isset($_SESSION['restaurant']) && empty($_SESSION["cart"])) 
{
	$_SESSION['cart'] = $items;
	$response['status']='success';
    $response['msg'] ="Item is added to your cart!";
    echo json_encode($response);

}
	
else{
	
	    if(array_search($id, array_column($_SESSION['cart'], 'f_ID')) !== FALSE){
	    	$response['status']='error';
	    $response['msg'] ="Item is already added to your cart!";
	    echo json_encode($response);
	    }
	   else {
	    $_SESSION["cart"] = array_merge($_SESSION["cart"],$items);
	   	$response['status']='success';
	    $response['msg'] ="Item is added to your cart!";
	    echo json_encode($response);
		}

	}

}
if ($_POST['action'] == 'remove') {
	
	if(array_search($_POST['f_ID'], array_column($_SESSION['cart'], 'f_ID')) !== FALSE){
	$key = array_search($_POST['f_ID'], array_column($_SESSION['cart'], 'f_ID'));
	echo $key;
	echo "<pre>";
	print_r($_SESSION['cart']);
	echo "<pre>";
	print_r($_SESSION['cart'][$key]);
	unset($_SESSION['cart'][$key]);
	echo "<pre>";
	print_r($_SESSION['cart']);
	$response['status']='success';
    $response['msg'] ="Item SuccessFully removed from your cart!";
    echo json_encode($response);
	}
}


?>