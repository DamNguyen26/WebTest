<?php
require_once "connection.php";

if (isset($_REQUEST["update"])) {
    $sql = "UPDATE Users SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssi", $firstname, $lastname, $email, $password, $id);
        // Set parameters and execute
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];

//        check old pass and update new pass
        $oldPass = $_POST["oldPassword"];
        $newPass = $_POST["newPassword"];
        if (password_verify( $oldPass, $password)) {
            if ( password_needs_rehash ( $oldPass, PASSWORD_DEFAULT ) ) {
                $password = password_hash( $newPass, PASSWORD_DEFAULT );
                $stmt->execute();
            }
        } else {
            echo '<script language="javascript">alert("Incorrect old password!"); window.location="show.php";</script>';
        }

//
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
