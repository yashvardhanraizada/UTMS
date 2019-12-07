<?php
$db_host = "localhost";
$db_name = "UTM_Database1";
$db_user = "postgres";
$db_pass = "Anshulpsql";
$conn = pg_connect("host=localhost port=5432 dbname=UTM_Database1 user=postgres password=Anshulpsql");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}