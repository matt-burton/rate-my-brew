<?php

require 'Slim/Slim.php';
require 'ChromePHP.php';

$app = new Slim();
$app->get('/users', 'getUsers');
$app->post('/add_user', 'addUser');
$app->post('/edit_user', 'editUser');
$app->get('/userview/:id', function ($name) {
    	$sql = "select * FROM users WHERE id=".$name." ORDER BY id";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$wines = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($wines);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}

});



$app->run();

function getUser() {

	$sql = "select * FROM users WHERE id=:userid ORDER BY id";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$wines = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($wines);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}





function getUsers() {
	$sql = "select * FROM users ORDER BY id";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$wines = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($wines);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function editUser() {
	//$request = Slim::getInstance()->request();
	ChromePhp::log($_POST);
	$sql = "UPDATE users SET id=:id, username=:username, password=:password, first_name=:first_name, surname=:surname, coffee_tea_pref=:coffee_tea_pref, coffee_sugar=:coffee_sugar, coffee_milk=:coffee_milk, coffeee_color=:coffeee_color, tea_sugar=:tea_sugar, tea_milk=:tea_milk, tea_color=:tea_color, coffee_bought_count=:coffee_bought_count, coffee_made_count=:coffee_made_count, average_brew_rating=:average_brew_rating, email=:email, gender=:gender WHERE id = :id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $_POST["id"]);
		$stmt->bindParam("username", $_POST["username"]);
		$stmt->bindParam("password", $_POST["password"]);
		$stmt->bindParam("first_name", $_POST["first_name"]);
		$stmt->bindParam("surname", $_POST["surname"]);
		$stmt->bindParam("coffee_tea_pref", $_POST["coffee_tea_pref"]);
		$stmt->bindParam("coffee_sugar", $_POST["coffee_sugar"]);
		$stmt->bindParam("coffee_milk", $_POST["coffee_milk"]);
		$stmt->bindParam("coffeee_color", $_POST["coffeee_color"]);
		$stmt->bindParam("tea_sugar", $_POST["tea_sugar"]);
		$stmt->bindParam("tea_milk", $_POST["tea_milk"]);
		$stmt->bindParam("tea_color", $_POST["tea_color"]);
		$stmt->bindParam("coffee_bought_count", $_POST["coffee_bought_count"]);
		$stmt->bindParam("coffee_made_count", $_POST["coffee_made_count"]);
		$stmt->bindParam("average_brew_rating", $_POST["average_brew_rating"]);
		$stmt->bindParam("email", $_POST["email"]);
		$stmt->bindParam("gender", $_POST["gender"]);
		//$stmt->bindParam("first_name", $user->first_name);
		//$stmt->bindParam("last_name", $user->last_name);
		//$stmt->bindParam("address", $user->address);
		$stmt->execute();
		//$user->id = $db->lastInsertId();
		$db = null;
		//echo json_encode($user); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}







function addUser() {
	$request = Slim::getInstance()->request();
	$user = json_decode($request->getBody());
	$sql = "INSERT INTO users (id, username, password, first_name, surname, coffee_tea_pref, coffee_sugar, coffee_milk, coffeee_color, tea_sugar, tea_milk, tea_color, coffee_bought_count, coffee_made_count, average_brew_rating, email, gender, (:id, :username, :password, :first_name, :surname, :coffee_tea_pref, :coffee_sugar, :coffee_milk, :coffeee_color, :tea_sugar, :tea_milk, :tea_color, :coffee_bought_count, :coffee_made_count, :average_brew_rating, :email, :gender)";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("username", $user->username);
		$stmt->bindParam("first_name", $user->first_name);
		$stmt->bindParam("last_name", $user->last_name);
		$stmt->bindParam("address", $user->address);
		$stmt->execute();
		$user->id = $db->lastInsertId();
		$db = null;
		echo json_encode($user); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getConnection() {
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="root";
	$dbname="ratemybrew";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

?>