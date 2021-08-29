<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Form Add</h2>
    <form action="includes/function/add.php" method="post">
        <label for="firstname">First name:</label><br>
        <input type="text" name="firstname" required><br>

        <label for="lastname">Last name:</label><br>
        <input type="text" name="lastname" required><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" required><br><br>

        <input type="submit" name="add" value="Submit">
    </form>
</body>

</html>