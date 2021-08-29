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
    <?php
    if ($stmt = $con->prepare('SELECT id, password FROM Users WHERE email = ?')) {
        $stmt->bind_param('s',  $_POST["email"]);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            if (password_verify($_POST['password'], $password)) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: show.php');
            } else {
                echo '<script language="javascript">alert("Incorrect password!"); window.location="login.php";</script>';
                session_destroy();
            }
        } else {
            echo '<script language="javascript">alert("Incorrect username!"); window.location="login.php";</script>';
            session_destroy();
        }
        $stmt->close();
    }
    ?>
</body>

</html>