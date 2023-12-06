<?php
$server_name= "localhost";
$user_name= "root";
$password= "";
$database_name= "crud_exam";
$conn = mysqli_connect($server_name, $user_name, $password, $database_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 