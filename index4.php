<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
    <?php
session_start();
    
  
 $_SESSION["Smok"] = $_POST["Smok"];
?>

<form action="index4.php"  method="POST">
    <?php echo"היי " . $_SESSION["name"] . "<br>";
          echo "אתה בן " . $_SESSION["age"] . "<br>";
          echo " אתה " . $_SESSION["Smok"] . " מעשן" . "<br>";
    ?>
</body>
</html>