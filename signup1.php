<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="tender.css">
<body>

<!-- Navbar (sitech on top) -->
<?php require "header.php"; ?>
<?php
  if(isset($_SESSION['username'])) : 
?>
<?php 
  header( "Location: home1.php" );
?>
<?php else :?>
<br>
<br>
<br>
<div class="tender-container tender-padding-32" id="contact">
    <h3 class="tender-border-bottom tender-border-light-grey tender-padding-12">Sign Up</h3>
    <p>Enter the details below to sign up.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input class="tender-input" type="text" placeholder="Name" required="required" name="name">
      <input class="tender-input tender-section" type="email" placeholder="Email" required="required" name="email">
      <input class="tender-input tender-section" type="text" placeholder="Username" required="required" name="username">
      <input class="tender-input tender-section" type="password" minlength="6" placeholder="Password" required="required" name="password">
      <input class="tender-input tender-section" placeholder="Contact Number" required="required" name="phno">

      <button class="tender-btn tender-section" type="submit">
        <i class="fa fa-paper-plane"></i> Submit
      </button>
    </form>
    <br>
    <?php
     /* $name= $email= $username= $password = $phno="";*/
      if($_POST)
      {
        $name=$_POST["name"];
        $email=$_POST["email"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $phno=$_POST["phno"];

        $link=mysqli_connect("localhost","root","","tender");
        $sql="INSERT INTO user(name,email,username,password,phno) values ('$name','$email','$username','$password','$phno')";
        $sql1="SELECT username from user where username='$username'";
        $sql2="SELECT username from user where email='$email'";
        $sql3="SELECT username from user where phno='$phno'";
        $result = mysqli_query($link,$sql1);
        $result1 = mysqli_query($link,$sql2);
        $result2 = mysqli_query($link,$sql3);
        $count1 = mysqli_num_rows($result1);
        $count2 = mysqli_num_rows($result2);
        $len = strlen($phno);
        $count = mysqli_num_rows($result);
        if($count2 >= 1)
        {
          echo "Phone number has already been used. Please choose another phone number.";
        }
        else if($count1 >= 1)
        {
          echo "E-mail has already been used. Please choose another E-mail.";
        }
        else if($count >= 1)
        {
          echo "Username has already been used. Please choose another username.";
        }
        else
        {
          if(!mysqli_query($link,$sql))
          {
           echo "ERROR! Please re-check the details entered.";
          }
          else
          {
           echo "Sign Up complete.";
          }
        }
        mysqli_close($link);
      }
    ?>
  </div>

  <?php require 'footer.php' ?>
<?php endif; ?>