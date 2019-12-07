<?php
require_once "pdo.php";
session_start();
if( isset($_POST['name']) && isset($_POST['user_id'])){
	$sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE user_id = :user_id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(
		':name' => $_POST['name'],
		':email' => $_POST['email'],
		'password' => $_POST['password'],
		':user_id' => $_POST['user_id']));
	$_SESSION['success'] = "Record Updated";
	header('Location: crud.php');
	return;
}
$stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row === false){
	$_SESSION['error'] = "Bad value for user_id";
	header('Location: crud.php');
	return;
}
$n = htmlentities($row['name']);
$e = htmlentities($row['email']);
$p = htmlentities($row['password']);
$user_id = htmlentities($row['user_id']);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Edit User</p>
<form method="post">
	<p>Name: <input type="text" name="name" value="<?= $n ?>"></p>
	<p>Email: <input type="text" name="email" value="<?= $e ?>"></p>
	<p>Password: <input type="text" name="password" value="<?= $p ?>"></p>
	<input type="hidden" name="user_id" value="<?= $user_id ?>">
	<p><input type="submit" value="Update"/>
		<a href="crud.php">Cancel</a></p>
</form>
</body>
</html>