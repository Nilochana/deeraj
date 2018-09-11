<?php
  $_SESSION['count'] = 0;
?>
<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="tender.css">
<body>

<!-- Navbar (sitech on top) -->
<?php require 'header.php' ?>
<br>
<br>
<br>
<div class="tender-container tender-padding-32" id="about">
    <h3 class="tender-border-bottom tender-border-light-grey tender-padding-12">School</h3>
    <p><center>
        <?php

        $link=mysqli_connect("localhost","root","","tender");

        $sql = "SELECT * FROM add_tender WHERE type = 'School'";
        $result = mysqli_query($link,$sql);

        if(! $result ) 
              {
                die('Could not get data: ' . mysql_error());
              }

              while($row = mysqli_fetch_array($result ,MYSQL_ASSOC))
              {
                  $_SESSION['count'] = 0;
                  ?>
                  <div class="tender-card-4" style="width:75%;">
                  <header class="tender-container tender-grey">
                  <h1><?php echo "<center><b>{$row['name']}</b></center>";?>
                  </h1>
                  </header>
                  <p>
                  <div style="margin-left:20px; margin-bottom:20px; text-align: left ">
                  <?php
                  echo "<b>Company Description</b> : {$row['description']} <br>".
                  "<b>Area</b> : {$row['area']} <br>".
                  "<b>Price</b> : {$row['price']} <br>".
                  "<b>Years required</b> : {$row['years']} <br>".
                  "<b>Contact Number</b> : {$row['phno']} <br>";
                  ?>
                  </div>
                  </p>
                  <br>
                  <br>
                  </div>
                  <br>
                  <br>
                  <?php
              }
              mysqli_close($link);
              //echo $_SESSION['id1'];
        ?>
        <a class="tender-btn" href="check.php">Bid for tender</a>
        </center>
    </p>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php require 'footer.php' ?>
