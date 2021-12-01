<?php
require_once "connection.php";

// Create database
$sql = "DROP TABLE Users";

if ($conn->query($sql) === true) {
    echo "Table delete successfully";
} else {
    echo "Error deleting table: " . $conn->error;
}

$conn->close();