<?php
require_once "connection.php";

if (isset($_REQUEST["update"])) {
    $sql = "UPDATE MyGuests SET id = ?, firstname = ?, lastname = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("issi", $id, $firstname, $lastname, $id);
        // Set parameters and execute
        $id = $_REQUEST["id"];
        $firstname = $_REQUEST["firstname"];
        $lastname = $_REQUEST["lastname"];
        $stmt->execute();
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
