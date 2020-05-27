<?php
$connect = mysqli_connect("localhost", "root", "", "foodorder");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE food SET ".$_POST["column_name"]."='".$value."' WHERE F_ID = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>