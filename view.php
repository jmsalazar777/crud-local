<?php
include ("database_connection.php" ); 
$id= $_GET['id' ];
$sql= "SELECT *  FROM `books`  WHERE  `id` =   $id";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>