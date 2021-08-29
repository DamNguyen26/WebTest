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
$sql = "SELECT id, firstname, lastname FROM MyGuests ORDER BY lastname";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    echo "<table>
    <tr>
    <th>ID</th>
    <th>firstname</th>
    <th>lastname</th>
    </tr>";
    // output data of each row
    while ($row = $result->fetch_assoc())
    {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td></tr>";
    }
    echo "</table>";
}
else
{
    echo "0 results";
}
$conn->close();
?>
</div>
</body>
</html>
