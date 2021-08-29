<!DOCTYPE html>
<html>

<head>
    <?php require_once "includes/function/connection.php"; ?>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT id, firstname, lastname, email FROM MyGuests";
    $stmt = $conn->prepare($sql);
    $stmt->bind_result($id, $firstname, $lastname, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<table>";
        echo "<theader>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>First name</th>";
        echo "<th>Last name</th>";
        echo "<th>Email</th>";
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
        echo "</tr>";
        echo "</theader>";
        echo "<tbody>";
        // output data of each row
        while ($stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $firstname . "</td>";
            echo "<td>" . $lastname . "</td>";
            echo "<td>" . $email . "</td>";
            echo '<td><form action="formUpdate.php" method="post"><input type="hidden" name = "id" value =' .
                $id .
                '><input type = "submit" value="Edit" name = "edit"></form></td>';
            echo '<td><form action="includes/function/delete.php" method="post"><input type="hidden" name = "id" value =' .
                $id .
                '><input type = "submit" value="Delete" name = "delete"></form></td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "0 results";
    }
    $stmt->close();
    $conn->close();
    ?>
</body>

</html>