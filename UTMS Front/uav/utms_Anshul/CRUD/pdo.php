<?php
$host = 'localhost';
$db = 'UTM_Database1';
$user = 'postgres';
$password= 'Anshulpsql';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$user;password=$password";
$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>