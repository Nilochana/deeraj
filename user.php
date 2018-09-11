<?php
  session_start();
?>
<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body>

<!-- Navbar (sitech on top) -->
<div class="w3-top">
  <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
    <li>
      <a href="home1.php" class="w3-margin-left"><b>Tenders</b> India</a>
    </li>
    <!-- Float links to the right. Hide them on small screens -->
    <li class="w3-right w3-hide-small">
      <a href="user.php" class="w3-left">User Details</a>
      <a href="bid.php" class="w3-left">Bid for tender</a>
      <a href="add.php" class="w3-left">Add tender</a>
      <a href="home1.php" class="w3-left w3-margin-right">Log out</a>
    </li>
  </ul>
</div>
<br>
<br>

<div class="w3-container w3-padding-32" id="about">
    <!-- First Grid: Logo & About -->
    <div class="w3-half w3-white w3-container" style="height:700px">
      <div class="w3-padding-64 w3-center">
        <h2>User Details</h2>
          <img src="avatar3.png" class="w3-margin w3-circle" alt="Person" style="width:50%">
          <div class="w3-left-align w3-padding-xxlarge">
              <h5>
              <?php

              $username=$_SESSION['username1'];

              $link=mysqli_connect("localhost","root","","tender");
              $sql = "SELECT * FROM user WHERE username = '$username'";
              $result = mysqli_query($link,$sql);

              if(! $result ) 
              {
                die('Could not get data: ' . mysql_error());
              }
              else
              {
                while($row = mysqli_fetch_array($result ,MYSQL_ASSOC))
                {
                    echo "<b>ID</b> : {$row['id']} <br>". 
                    "<b>Name</b> : {$row['name']}  <br> ".
                    "<b>Email</b> : {$row['email']} <br> ".
                    "<b>Contact Number</b> : {$row['phno']} <br> ";
                }
              }
              $sql1 = "SELECT id from user WHERE username = '$username'";
              $result1 = mysqli_query($link,$sql);
              $row = $result1->fetch_assoc();
              $_SESSION['id1']=$row['id'];
              //$_SESSION['id1'] = mysqli_query($link,"SELECT id from user WHERE username='$username'");
              //echo $_SESSION['id1'];
              mysqli_close($link);
              ?>
              </h5>
          </div>
      </div>
    </div>
    <div class="w3-row">
      <div class="w3-half w3-light-grey w3-container w3-center" style="height:700px">
        <div class="w3-padding-64">
        <h2>Added Tenders</h2>
        <div class="w3-left-align w3-padding-xxlarge">
        <h5>
        <?php

        $link=mysqli_connect("localhost","root","","tender");

        $id = $_SESSION['id1'];

        $sql = "SELECT * FROM add_tender WHERE id = '$id'";
        $result = mysqli_query($link,$sql);

        if(! $result ) 
              {
                die('Could not get data: ' . mysql_error());
              }

              while($row = mysqli_fetch_array($result ,MYSQL_ASSOC))
              {
                  echo "<b>Name</b> : {$row['name']}  <br> ".
                  "<b>Email</b> : {$row['email']} <br> ".
                  "<b>Type</b> : {$row['type']} <br>".
                  "<b>Company Description</b> : {$row['description']} <br>".
                  "<b>Area</b> : {$row['area']} <br>".
                  "<b>Price</b> : {$row['price']} <br>".
                  "<b>Years required</b> : {$row['years']} <br>".
                  "<b>Contact Number</b> : {$row['phno']} <br><br> ";
              }
              mysqli_close($link);
              //echo $_SESSION['id1'];
        ?>
        </div>
      </div>
    </div>
  </div>

  <br>
  <br>
  <br>
  <footer class="w3-center w3-black w3-padding-16">
  <p> Tenders India Pvt.Ltd<br>
      A-Block, CGO Complex, Lodhi Road, Bangalore - 560 004, India.<br>
      Phone: 88888-88888 Email: info@tendersindia.in
  </p>
</footer>
