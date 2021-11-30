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
        $sql = "SELECT id, password FROM Users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',  $email, $password);
        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt->execute();
        $stmt->store_result();
        $hash = password_hash( $password , PASSWORD_DEFAULT );
        if (password_verify( $password, $hash)) {
            if ( password_needs_rehash ( $hash, PASSWORD_DEFAULT ) ) {
                $newHash = password_hash( $password, PASSWORD_DEFAULT );
//                session_regenerate_id();
//                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                header('Location: show.php');
            }
        } else {
            echo '<script language="javascript">alert("Incorrect password!"); window.location="formLogin.php";</script>';
            session_destroy();
        }
        $stmt->close();
    }
    ?>
</body>

</html>