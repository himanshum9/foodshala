<?php
session_start();
include_once('function.php');
$params = $_POST;
$obj = new DB_con();
$params['path'] ="images/food_items/download.jpg";
if (isset($_POST['string']) && $_FILES['file']['error']!=4) {
	$currentDir = getcwd();
    $uploadDirectoryy = "images/food_items/";
	$uploadDirectory = "/../images/food_items/";
	$errors = [];

	$fileExtensions = ['jpeg','jpg','png'];

	$fileName = $_FILES['file']['name'];
	$fileSize = $_FILES['file']['size'];
	$fileTmpName  = $_FILES['file']['tmp_name'];
	$fileType = $_FILES['file']['type'];
	$tmp = explode('.', strtolower($fileName));
	$fileExtension = end($tmp);

	$uploadPath = $currentDir .$uploadDirectory . basename($fileName);
    if (! in_array($fileExtension,$fileExtensions)) {
        $errors['msg'] = $response['msg'] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }
    if ($fileSize > 2000000) {
       $errors['msg'] = $response['msg'] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
    }
    if (empty($errors['msg'])) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            $params['path'] =$uploadDirectoryy . basename($fileName);
            $sql = $obj->save_item($params);
            if ($sql) {
	        	$response['status']='success';
	            $response['msg'] ="The item has been saved Successfully!";
	            echo json_encode($response);
            }
           
        } else {
        	$response['status']='error';
            $response['msg'] ="An error occurred somewhere. Try again or contact the admin";

        }
    } else {
    	$response['status']='error';
    	echo json_encode($response);
    }
}
 else {
 	if ($_POST['string']=='save') {
 	$sql =$obj->save_item($params);
 	$response['status']='success';
    $response['msg'] ="The item has been saved Successfully!";
    echo json_encode($response);
	}
 }
