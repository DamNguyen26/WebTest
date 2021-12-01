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
        $sql = "SELECT id FROM Users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',  $email, $password);
        $email = $_POST["email"];
        $pass = $_POST["password"];
//        $passwordHashed = password_hash( $pass , PASSWORD_DEFAULT );
        if (password_verify($pass, $password)) {
//            if (password_needs_rehash ($pass, PASSWORD_DEFAULT ) ) {
                $stmt->execute();
//                session_regenerate_id();
//                $_SESSION['loggedin'] = TRUE;
//                $_SESSION['name'] = $_POST['username'];
                header('Location: show.php');
//            }
        } else {
            echo '<script language="javascript">alert("Incorrect password!"); window.location="formLogin.php";</script>';
            session_destroy();
        }
        $stmt->close();
    }
    ?>
</body>

</html>