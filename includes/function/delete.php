<?php
require_once ("connection.php");

// Sql to delete a record
$sql = "DELETE FROM MyGuests";

if ($conn->query($sql) === true)
{
    echo "Record deleted successfully";
}
else
{
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
