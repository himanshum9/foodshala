<?php include 'function.php';
session_start();
	if (!isset($_SESSION['user'])) {
		session_destroy();
		echo json_encode("error");
		die;
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
	$response['count'] = count($_SESSION['cart']);
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
	   	$response['count'] = count($_SESSION['cart']);
	    $response['msg'] ="Item is added to your cart!";
	    echo json_encode($response);
		}

	}

}
if ($_POST['action'] == 'remove') {
	$_SESSION['cart'] = array_values($_SESSION['cart']);
	if(array_search($_POST['f_ID'], array_column($_SESSION['cart'], 'f_ID')) !== FALSE){
	$key = array_search($_POST['f_ID'], array_column($_SESSION['cart'], 'f_ID'));
	unset($_SESSION['cart'][$key]);
	$response['status']='success';
    $response['msg'] ="Item SuccessFully removed from your cart!";
    echo json_encode($response);
	}
}
if ($_POST['action'] == 'order') {
	$id = $_POST['f_ID'];
	$items = array(
		$_POST['f_ID'] = array(
		'f_ID' => $_POST['f_ID'],
		'quantity' => $_POST['quantity']
	)
	);
	if (empty($_SESSION["cart"])) {
	$_SESSION['cart'] = $items;
	$response['status']='success';
	$response['count'] = count($_SESSION['cart']);
    $response['msg'] ="Taking you to the cart";
    echo json_encode($response);
	}
	else{
		if(array_search($id, array_column($_SESSION['cart'], 'f_ID')) !== FALSE){
	    	$response['status']='success';
	    $response['msg'] ="Item is already inside cart taking you to cart page!!";
	    echo json_encode($response);
	    }
	   else {
	   	//die('hii');
	    $_SESSION["cart"] = array_merge($_SESSION["cart"],$items);
	   	$response['status']='success';
	   	$response['count'] = count($_SESSION['cart']);
	    $response['msg'] ="Item is added to your cart and taking to you cart page!";
	    echo json_encode($response);
		}

		}
}


?>