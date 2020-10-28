<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_curd";
$path = 'http://localhost/php/user_curd/';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>