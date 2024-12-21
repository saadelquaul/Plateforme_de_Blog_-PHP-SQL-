<?php
include '../includes/database.php';

if (isset($_GET['id'])) {
    $articleId = intval($_GET['id']);
    $sql = "DELETE FROM blogs WHERE blogID = $articleId";

    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'Error: ' . $conn->error;
    }
} else {
    echo 'Invalid request';
}
?>