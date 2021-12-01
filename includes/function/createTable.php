<?php
require_once "connection.php";
$table = "Users";
$sql = "SHOW TABLES LIKE '".$table."'";

if ($conn->query($sql) -> num_rows == 1) {
    echo "Table Users EXISTS !";
}
else {
    // Sql to create table
    $sql = "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === true) {
        echo "Table Users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
$conn->close();
