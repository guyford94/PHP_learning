<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
<?php 
    session_start();
    
    $_SESSION["age"] = $_POST["age"];
?>

<form action="index4.php"  method="POST">
    <?php echo"היי " . $_SESSION["name"] . "<br>";
          echo "אתה בן " . $_SESSION["age"] . "\n";
    ?>
    <br>
    האם אתה מעשן?
    כן
    <br>
    <input type="radio" name="Smok" value="כן">
    <br>
    לא
    <br>
    <input type="radio" name="Smok" value="לא">
    <br>
    <input type="submit">

</form>

</body>
</html>