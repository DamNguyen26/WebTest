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

    <form action="welcome.php" method="post">
        <label for="email">Email:</label><br>
        <input type="text" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Submit">
    </form>
</body>

</html>