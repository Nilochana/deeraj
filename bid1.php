<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="tender.css">

<style> 
input[type=text] {
    width: 47%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
}
</style>

<body>

<!-- Navbar (sitech on top) -->
<?php require "header.php"; ?>
<?php
  if(!isset($_SESSION['username'])) : 
?>
<?php 
  header( "Location: home1.php" );
?>
<?php else :?> 
<br>
<br>
<center>
<div class="tender-container tender-padding-32" id="contact">
<h3 class=" tender-padding-12">Enter the name of the company you want to bid for</h3>
<br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <input type="text" required name="id1" placeholder="Search..">
  <br>
  <br>
  <br>
  <br>
  <?php
  if($_POST)
  {
        $link=mysqli_connect("localhost","root","","tender");
        $_SESSION['name'] = $_POST['id1'];
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM add_tender WHERE name = '$name'";
        $result = mysqli_query($link,$sql);
        // $data = mysqli_fetch_array($result, MYSQLI_NUM);
        // if(!($data[0]>=1))
        // {
        //   echo "No such record found.";
        // }  
        // else 
        if($result)
        {
              while($row = mysqli_fetch_array($result ,MYSQL_ASSOC))
              {
                  $_SESSION['tid'] = $row['tender_id']; 
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
                  <a class="tender-btn" href="bid.php">Bid for tender</a>
                  </p>
                  <br>
                  </div>
                  <?php 
              }
          }
          mysqli_close($link);
    }
?>
</form>
</div>
</center>
<?php endif; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php require 'footer.php' ?>
