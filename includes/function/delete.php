<?php
require_once ("connection.php");

if (isset($_REQUEST['delete'])){
    $sql = "DELETE FROM MyGuests WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $id = $_REQUEST['id'];
    $stmt->execute();
    echo "Record deleted successfully";
    }else {
      echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
    }
?>
