<?php
include("database_connection.php");

$title = $_POST['title'];
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$year_published = $_POST['yearPublished'];
$category = $_POST['category'];

$sql = "INSERT INTO books (`title`, `isbn`, `author`, `publisher`, `year_published`, `category`)
        VALUES ('".$title."', '".$isbn."', '".$author."', '".$publisher."', '".(int)$year_published."', '".$category."')";

if (mysqli_query($conn, $sql)) {
    $response = [
        'status' => 'ok',
        'success' => true,
        'message' => 'Record created successfully!'
    ];
    echo json_encode($response);
} else {
    $response = [
        'status' => 'ok',
        'success' => false,
        'message' => 'Record creation failed!'
    ];
    echo json_encode($response);
}
?>
