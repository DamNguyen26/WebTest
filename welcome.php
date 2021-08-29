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
    <?php if (isset($_REQUEST["login"])) {
        $sql = "SELECT email, password FROM Users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $id = $_REQUEST["id"];
        $stmt->bind_result($id, $firstname, $lastname, $email);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();
    } ?>
    Welcome <?php echo $_POST["name"]; ?><br>
    Your email address is: <?php echo $_POST["email"]; ?>
    </form>
    </form>
</body>

</html>