<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "foodorder");
session_start();
$rest_id = $_SESSION['restaurant']['id'];
$columns = array('name', 'price', 'description', 'vegan','status');

$query = "SELECT * FROM food WHERE R_ID = ".$rest_id." ";
if(!empty($_POST["search"]["value"]))
{
 $query .= '
 AND name LIKE "%'.$_POST["search"]["value"].'%" 
 OR price LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY F_ID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
 //echo $query;
// $data = mysqli_query($connect, $query);
// echo "<pre>";
// print_r($data);
// die;
$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["F_ID"].'" prevvalue="'.$row["name"].'" data-column="name">' . $row["name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["F_ID"].'" prevvalue="'.$row["price"].'" data-column="price">' . $row["price"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["F_ID"].'" prevvalue="'.$row["description"].'" data-column="description">' . $row["description"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["F_ID"].'" prevvalue="'.$row["vegan"].'"  data-column="vegan">' . $row["vegan"] . '</div>';

 $sub_array[] = '<button type="button" name="status" data-set ="'.$row["status"].'" class="btn btn-danger btn-xs status" data-column="status" id="'.$row["F_ID"].'">' . (($row["status"] == 1) ? "&#10004" : "&#10005") .'</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM food";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>