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
    if (isset($_REQUEST["login"])) {
        $sql = "SELECT email, password FROM Users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',  $email);

        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt->execute();
        $stmt->bind_result($email, $password);
        $row = $stmt->fetch();
        if (!empty($row)){
            if (password_verify($password, $row["password"])) {
                echo "success";
//                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                header('Location: show.php');
            } else {
                echo '<script language="javascript">alert("Invalid username or password!"); window.location="formLogin.php";</script>';
                session_destroy();
            }
        }else {
            echo "This User Name does not exist";
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</body>

</html>