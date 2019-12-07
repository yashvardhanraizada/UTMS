<?php
require_once "pdo.php";
session_start();
$stmt = $pdo->query("SELECT name, email, password, user_id FROM users")
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="crudstyle.css">
</head>
<body>
<?php
if(isset($_SESSION['error'])){
	echo '<p style="color:red">'.$_SESSION['error'].'</p>';
	unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
	echo '<p style="color:green">'.$_SESSION['success'].'</p>';
	unset($_SESSION['success']);
}
echo '<table><tr><th>Name</th><th>E-mail</th><th>Password</th><th>Action</th></tr>';
while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
	echo "<tr><td>";
	echo (htmlentities($row['name']));
	echo "</td><td>";
	echo (htmlentities($row['email']));
	echo "</td><td>";
	echo (htmlentities($row['password']));
	echo "</td><td>";
	echo ('<a href="edit.php?user_id='.$row['user_id'].'">EDIT</a> /');
	echo ('<a href="deletecrud.php?user_id='.$row['user_id'].'">DELETE</a> ');
	echo ("</td></tr>");
}
?>
</table>
<a href="addcrud.php">Add New</a>

</body>
</html>