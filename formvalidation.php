<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="mains.css">
  <title>PHP Form Validation</title>
</head>

<?php
  //1
  define ("BR","<BR>");
  $email_check = "/^[a-zA-z0-9]+@[a-zA-z0-9]+(\.com|\.co\.il)$/";
  $url_check = "/^(www\.)[a-zA-Z0-9]+(\.com|\.co\.il)$/";
  $tal_check = "/^05[0|2|3|4|5][\s|-][0-9]{7}$/";
  // define a custom function to sanitize the user input data as a precuation from any malicious attacks
  function test_input($data) {

  //2
    $data = trim($data);
  //3
    $data = stripslashes($data);
  //4
    $data = htmlspecialchars($data);
    return $data;
  }
  //initialize variables for value as well as errors
  $name=$email=$gender=$comment=$website=$tal="";
  $name_err=$email_err=$gender_err=$comment_err=$website_err=$tal_err="";

  // Check if coming from submitted form and do the validations on user inputs in form
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
  //5
    if (empty($_POST["name"])) {
      $name_err = "Name cannot be left blank.";
    }
    else {
      $name = test_input($_POST["name"]);
	  //6
      // check for correctness of name or validate our name test_input
      if (!preg_match("/^[a-zA-z ]*$/",$name)) {
        $name_err = "Name is not in valid format, can contain only letters.";
      }
    }

    if (empty($_POST["email"])) {
      $email_err = "Email cannot be left blank.";
    }
    else {
      $email = test_input($_POST["email"]);
	  //7
    if (!preg_match($email_check, $_POST["email"])){
        $email_err = "Email format is not correct.";
      }
    }
    if (empty($_POST["website"])) {
      $website_err = "website cannot be left blank.";
    }
    if (!empty($_POST["website"])) {
      $website = test_input($_POST["website"]);

     if (!preg_match($url_check, $website)){
        $website_err = "Website format is not correct.";
      }

    }
    if (empty($_POST["tal"])) {
      $tal_err = "tal cannot be left blank.";
    }
    if (!empty($_POST["tal"])) {
      $tal = test_input($_POST["tal"]);

     if (!preg_match($tal_check, $tal)){
        $tal_err = "tal format is not correct.";
      }

    }
    if (!empty($_POST["comment"])) {
      $comment = test_input($_POST["comment"]);
    }
    if (!empty($_POST["gender"])) {
      $gender = test_input($_POST["gender"]);
    }

  }
 ?>
<body><!-- 8 -->
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" >
    Name: <input type="text" name="name" id="name" value="<?php echo $name; ?>"> <br>
    <span style="color:red"> <?php echo $name_err; ?></span><br>
    <!-- 9 -->
    Email:<input type = "text" name="email" id="email" value="<?php echo $email; ?>"><br>
    <span style="color:red"> <?php echo $email_err; ?></span><br>
    Website:<input type = "text" name="website" id="website" value="<?php echo $website; ?>"><br>
    <span style="color:red"> <?php echo $website_err; ?></span><br>
    tal:<input type = "text" name="tal" id="tal" value="<?php echo $tal; ?>"><br>
    <span style="color:red"> <?php echo $tal_err; ?></span><br>

    Gender:<br>
    <!-- 10 -->
	<input type = "radio" name="gender" id="female" value="female" <?php if ($gender=="female") {echo "checked";} ?> >Female
    <input type = "radio" name="gender" id="male" value="male" <?php if ($gender=="male") {echo "checked";} ?>>Male
    <input type = "radio" name="gender" id="other" value="other" <?php if ($gender=="other") {echo "checked";} ?>>other<br><br>
    <span style="color:red"> <?php echo $gender_err; ?></span><br>
    Comment:
    <textarea name="comment" id="comment" value="" cols="50" rows="10"><?php echo $comment; ?></textarea> <br><br><br>
    <span style="color:red"> <?php echo $comment_err; ?></span><br>
    <input type="Submit" value="Submit" name="Submit">

  </form>

  <?php

//11
   // if the form is submitted and no errors are found in any of the fields, show the success message with all of the data
   if (($_SERVER["REQUEST_METHOD"]=="POST")
        and ($name_err=="" and $email_err=="" and $website_err=="" and $gender_err=="" and $comment_err=="")){
     echo BR.BR.BR.'Submission Successful: '.BR.BR;
     echo 'Name: '.$name.BR;
     echo 'E-mail: '.$email.BR;
     echo 'Portal: '.$website.BR;
     echo 'Gender: '.$gender.BR;
     echo 'Comment: '.$comment.BR;

   }

   ?>

</body>

</html>
