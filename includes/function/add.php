<?php
require_once "connection.php";

if (isset($_REQUEST["add"])) {
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)";
    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $firstname, $lastname, $email);

    // Set parameters and execute
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $stmt->execute();

    echo "New records created successfully";
    echo '<a href="../../show.php">Show</a>';

    $stmt->close();
    $conn->close();
}
