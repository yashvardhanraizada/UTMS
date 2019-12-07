<?php
require_once "pdo.php";
session_start();

$name = 'user';
$email = 'sample';
$password = 'pass';

for($i=1;$i<=100;$i++){
	$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(
		':name' => $name.$i,
		':email' => $email.$i.'@email.com',
		':password' => $password.$i));
}
	
	$_SESSION['success'] = "Sample Database Created";
	header ('Location: crud.php');
	return;

?>