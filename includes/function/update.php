<?php
require_once "connection.php";

if (isset($_REQUEST["update"])) {
    $sql = "UPDATE Users SET firstname = ?, lastname = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssi", $firstname, $lastname, $email, $id);
        // Set parameters and execute
        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $email = $_REQUEST["email"];
        $id = $_REQUEST["id"];
        $stmt->execute();
        echo "Record updated successfully";
        echo '<a href="../../show.php">Show</a>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
