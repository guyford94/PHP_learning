<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Document</title>
</head>
<body>
    
<?php 
    session_start();
    
    $_SESSION["name"]=$_POST["name"];
?>
    <form action="index3.php"  method="POST">
    <?php echo "HII " . $_SESSION["name" ] . "\n"; ?>
    <br>
    מה גילך?
    <input type="text" name="age">
    <br>
    <input type="submit">

</form>



</body>
</html>