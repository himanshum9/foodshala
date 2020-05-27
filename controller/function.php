<?php
define('DB_SERVER','localhost');// Your hostname
define('DB_USER','root'); // Databse username
define('DB_PASS' ,''); // Database Password
define('DB_NAME', 'foodorder');// Database name

class DB_con
{
function __construct()
{
	$dsn = "mysql:host=localhost;dbname=foodorder";
	$pdo = new PDO($dsn,DB_USER, DB_PASS);
//$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$pdo;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}

public function usernameavailblty($uname) {
$result =mysqli_query($this->dbh,"SELECT Username FROM users WHERE Username='$uname'");
return $result;

}

public function register_user($params)
{
	$params['password'] = md5($params['password']);
	$sql="insert into users(Username,Password,user_role) values(?,?,?)";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params['username'],$params['password'],$params['user_role']]);
	//$stmt->close();
	$sql="insert into user_info(email,contact,address,vegan) values(?,?,?,?)";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params['email'],$params['contact'],$params['address'],$params['vegan']]);
	//$stmt->close();
	return "true";
}

public function register_restaurant($params)
{
	$params['password'] = md5($params['password']);
	$sql="insert into users(Username,Password,user_role) values(?,?,?)";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params['username'],$params['password'],$params['user_role']]);
	//$stmt->close();
	$id = $this->dbh->lastInsertId();
	$sql="insert into user_info(user_id,email,contact,address,vegan) values(?,?,?,?,?)";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$id,$params['email'],$params['contact'],$params['address'],'NULL']);
	//$stmt->close();
	$sql ="insert into restaurants(name,user_id) values(?,?)";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params['restaurant_name'],$id]);
	return "true";
}


public function signin($params)
{	$params['password'] = md5($params['password']);
	$sql="SELECT * FROM users WHERE username = ? AND password=?";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params['username'], $params['password']]);
	$user = $stmt->fetch();
	return $user;
}

public function save_item($params){
	 $sql ="insert into food(name,price,description,R_ID,images_path,vegan,status) values(?,?,?,?,?,?,?)";
	 $stmt =$this->dbh->prepare($sql);
	 if($stmt->execute([$params['name'],$params['price'],$params['description'],$_SESSION['restaurant']['id'],$params['path'],$params['vegan'],1])){
	 return 'success';
	}else{
		return $stmt->error;
	}
}

public function get_restaurant_detail_by_id($params){
	$sql = "SELECT * FROM restaurants WHERE user_id=?";
	$stmt =$this->dbh->prepare($sql);
	$stmt->execute([$params]);
	$result = $stmt->fetch();
	return $result;
}

public function get_restaurant_food_items($params){
	$sql ="SELECT * FROM food WHERE `R_ID` = ?";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params]);
	$result = $stmt->fetchAll();
	return $result;
}

public function get_all_food_items($params){
	$sql ="SELECT `food`.`F_ID`,`food`.`name` AS `foodname`,`food`.`price`,`food`.`description`,`food`.`R_ID`,`food`.`images_path`,`food`.`status`,`restaurants`.`name` as `rest_name` from `food` left join `restaurants` on `food`.`R_ID` = `restaurants`.`id` WHERE `food`.`status`= 1 order By `food`.`F_ID` desc LIMIT ".$params["offset"].",".$params["rec_per_page"];
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

public function get_particular_food_item($params){
	$sql="SELECT F_ID,description,price,images_path,name,R_ID from food WHERE F_ID=?";
	$stmt =$this->dbh->prepare($sql);
	$stmt->execute([$params]);
	$result = $stmt->fetch();
	return $result;
}

public function get_restaurant_orders($params){
	$sql="SELECT `users`.`username`,`orders`.`order_date`,`food`.`name`,`food`.`R_ID`,`food`.`price`,`orders`.`quantity` FROM `orders` INNER JOIN `users` on `orders`.`user_id` = `users`.`id` INNER JOIN `food` ON `orders`.`F_ID` = `food`.`F_ID` WHERE `orders`.`R_ID` = ?";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params]);
	$result = $stmt->fetchAll();
	return $result;
}

public function insert_order_details($params){
	$sql = "INSERT into orders(`user_id`,`R_ID`,`F_ID`,`quantity`,`order_date`) values(?,?,?,?,?)";
	$stmt = $this->dbh->prepare($sql);
	if($stmt->execute([$params['user_id'],$params['rest_id'],$params['food_id'],$params['quantity'],$params['order_date']])){
		return "success";
	}
	else{
		return $stmt->error;
	}

}

public function count_all_items(){
	$sql ="SELECT count(*) FROM food WHERE `status`=?";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([1]);
	$result = $stmt->fetch();
	return $result;
}
public function get_user_detail_by_id($params){
	$sql = "SELECT vegan from user_info WHERE user_id =?";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params]);
	$result = $stmt->fetch();
	return $result;
}

public function get_all_food_items_with_preference($params){
	$sql ="SELECT `food`.`F_ID`,`food`.`name` AS `foodname`,`food`.`price`,`food`.`description`,`food`.`R_ID`,`food`.`images_path`,`food`.`status`,`restaurants`.`name` as `rest_name` from `food` left join `restaurants` on `food`.`R_ID` = `restaurants`.`id` WHERE vegan = ".$params['vegan']." LIMIT ".$params["offset"].",".$params["rec_per_page"];
	
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}
public function save_restaurant_data($params){
	// $sql = "UPDATE restaurants SET name= ".$params['name'].", contact= ".$params['contact'].", email= ".$params['email'].",address= ".$params['address']." WHERE user_id= ".$params['user_id'];
	$sql = "UPDATE restaurants SET name = ? ,contact = ? ,email = ?, address = ?, WHERE user_id = ?";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params['name'],$params['contact'],$params['email'],$params['address'],$params['user_id']]);
	echo $stmt->debugDumpParams();
	// if(){
	// 	return "success";
	// }
	// else{
	// 	return "error";
	// }
}

public function get_users_orders($params){
	$sql="SELECT `users`.`username`,`orders`.`order_date`,`food`.`name`,`food`.`R_ID`,`restaurants`.`name` as `rest_name`,`food`.`price`,`orders`.`quantity`,`food`.`images_path` as `image` FROM `orders` INNER JOIN `users` on `orders`.`user_id` = `users`.`id` INNER JOIN `food` ON `orders`.`F_ID` = `food`.`F_ID` left join `restaurants` on `food`.`R_ID` = `restaurants`.`id` WHERE `orders`.`user_id` = ? order By `orders`.`order_date` desc";
	$stmt = $this->dbh->prepare($sql);
	$stmt->execute([$params]);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

}
?>