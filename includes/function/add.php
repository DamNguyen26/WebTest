<?php
require_once ("connection.php");

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// Set parameters and execute
$firstname = $_POST['name'];
$lastname = $_POST['comment'];
$email = $_POST['email'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>