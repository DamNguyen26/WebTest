<!DOCTYPE HTML>  
<html>
<head>
<?php 
require_once("includes/function/connection.php");
?>
</head>
<body>  

<?php
if (isset($_REQUEST['edit'])){
    $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $id = $_REQUEST['id'];
    $stmt->bind_result($id, $firstname, $lastname);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();
}     
?>


<h2>PHP Form Validation Example</h2>
<form action="includes/function/update.php" method="post">  
id: <input type="text" name="id" value="<?php if(isset ($id)){echo $id;}?>">
  <br><br>
  firstname: <input type="text" name="firstname" value="<?php if(isset ($firstname)){echo $firstname;}?>">
  <br><br>
  lastname: <textarea name="lastname" rows="5" cols="40"><?php if(isset ($lastname)){echo $lastname;}?></textarea>
  <input type="submit" name="update" value="Submit">  
</form>

</body>
</html>
