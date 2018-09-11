<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="tender.css">
<body>

<!-- Navbar (sitech on top) -->
<?php require 'header.php' ?>
<?php
  if(isset($_SESSION['username']) && ($_SESSION['count'] === 1)) : 
?>
<?php 
  header( "Location: bid1.php" );
?>  
<?php elseif(isset($_SESSION['username'])) : ?>
<?php 
  header( "Location: home1.php" );
?> 
<?php else :?>
<div class="tender-padding-64 tender-padding-xxlarge">
      <h1>Login</h1>
      <center>
      <form class="tender-container tender-card-4 tender-padding-32 tender-white" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:45%" method="post">
        <div class="tender-group">
          <input class="tender-input" style="width:100%;" type="text" placeholder="Username" required name="username">
        </div>
        <div class="tender-group">
          <input class="tender-input" style="width:100%;" type="password" placeholder="Password" required name="password">
        </div>
        <button type="submit" class="tender-btn tender-padding tender-center">Login</button><br><br>
        <a href="signup1.php">Do not have an account? Click here to sign up</a>
      </form>
      </center>
    </div>
    <center>
    <?php
      if($_POST)
      {
        //$_SESSION['username1']=$_POST["username"];
        $link=mysqli_connect("localhost","root","","tender");
        $username=$_POST["username"];
        $password=$_POST["password"];
        $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($link,$sql);
        $data = mysqli_fetch_array($result, MYSQLI_NUM);
        if(!($data[0]>=1))
        {
          echo "Invalid username or password.";
        }  
        else
        {
          if($_SESSION['count'] === 1)
          {
            $_SESSION['count'] = 0;
            $_SESSION['username'] = $username;
            header( "Location: bid1.php" );
          }
          else
          {
            $_SESSION['username'] = $username;
            header( "Location: user1.php" );
          }
        }
        mysqli_close($link);
      }
  ?>
  </center>
  <?php endif;?>
<br>
<br>
<br>
<?php require 'footer.php' ?>