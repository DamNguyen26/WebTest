<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "includes/function/connection.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_REQUEST["edit"])) {
        $sql = "SELECT id, firstname, lastname, email FROM Users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $id = $_REQUEST["id"];
        $stmt->bind_result($id, $firstname, $lastname, $email);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();
    } ?>

    <h2>Form Update</h2>

    <form action="includes/function/update.php" method="post">
        <label for="id">Id:</label><br>
        <input type="text" name="id" value="<?php if(isset($id)){echo $id;}?>" readonly><br>

        <label for="firstname">First name:</label><br>
        <input type="text" name="firstname" value="<?php if(isset($firstname)){echo $firstname;}?>"><br>

        <label for="lastname">Last name:</label><br>
        <input type="text" name="lastname" value="<?php if(isset($lastname)){echo $lastname;}?>"><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" value="<?php if(isset($email)){echo $email;}?>"><br><br>

        <input type="submit" name="update" value="Submit">
    </form>
</body>

</html>