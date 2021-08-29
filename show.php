<!DOCTYPE html>
<html>
<head>
    <?php
    require_once("includes/function/connection.php")
    ?>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<div>
<?php
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$stmt = $conn->prepare($sql);
$stmt->bind_result($id, $firstname, $lastname);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0)
{
    echo "<table>";
    echo "<theader>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>firstname</th>";
        echo "<th>lastname</th>";
        echo "<th>edit</th>";
        echo "<th>delete</th>";
        echo "</tr>";
    echo "</theader>";
    echo "<tbody>";
    // output data of each row
        while ($stmt->fetch())
        {
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $firstname . "</td>";
            echo "<td>" . $lastname . "</td>";
            echo '<td><form action="formUpdate.php" method="post"><input type="hidden" name = "id" value ='.$id.'><input type = "submit" value="Edit" name = "edit"></form></td>';
            echo '<td><form action="includes/function/delete.php" method="post"><input type="hidden" name = "id" value ='.$id.'><input type = "submit" value="Delete" name = "delete"></form></td>';
            echo "</tr>";
        }
    echo "</tbody>";
    echo "</table>";
}
else
{
    echo "0 results";
}
$stmt->close();
$conn->close();
?>
</div>
</body>
</html>
