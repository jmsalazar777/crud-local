<?php
include ("database_connection.php" );

    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $yearPublished = $_POST['yearPublished'];
    $category = $_POST['category'];
    $bookId = $_POST['id']; 

    $sql = "UPDATE `books` SET 
            `title` = '{$title}',
            `isbn` = '{$isbn}',
            `author` = '{$author}',
            `publisher` = '{$publisher}',
            `year_published` = '{$yearPublished}',
            `category` = '{$category}'
            WHERE `id` = {$bookId}";

    if (mysqli_query($conn, $sql)) {
        $response = [
            'status' => 'ok',
            'success' => true,
            'message' => 'Record updated successfully!'
        ];
        print_r(json_encode($response));
    } else {
        $response = [
            'status' => 'ok',
            'success' => false,
            'message' => 'Record update failed!'
        ];
        print_r(json_encode($response));
    }
?>