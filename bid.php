<html>
<title>Tender</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="tender.css">
<body>

<!-- Navbar (sitech on top) -->
<?php require 'header.php' ?>
<?php
  if(!isset($_SESSION['username'])) : 
?>
<?php 
  header( "Location: home1.php" );
?>
<?php else :?>
<br>
<br>
<br>
<center>
<div class="tender-container tender-padding-32" id="about">
<?php
        $link=mysqli_connect("localhost","root","","tender");
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM add_tender WHERE name = '$name'";
        $result = mysqli_query($link,$sql);

        if(! $result ) 
        {
            die('Could not get data: ' . mysql_error());
        }
        else
        {
              while($row = mysqli_fetch_array($result ,MYSQL_ASSOC))
              {
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
                  </div>
                  <?php 
              }
          }
          mysqli_close($link);
?>
</div>
</center>
<div class="tender-container tender-padding-32" id="contact">
    <h3 class="tender-border-bottom tender-border-light-grey tender-padding-12">Bid for above tender</h3>
    <p>Enter the appopriate details to bid for the above tender tender.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input class="tender-input" type="text" placeholder="Organisation Name" required="required" name="name">
      <input class="tender-input tender-section" type="email" placeholder="Email" required="required" name="email">
      <input class="tender-input tender-section" type="text" placeholder="Description" required name="description">
      <input class="tender-input tender-section" type="number" placeholder="Price" required name="price">
      <input class="tender-input tender-section" type="number" placeholder="Time Period" required name="years">
      <input class="tender-input tender-section" type="number" placeholder="Contact Number" required="required" name="phno">

      <button class="tender-btn tender-section" type="submit">
        <i class="fa fa-paper-plane"></i> Submit
      </button>
    </form>
    <?php
     /* $name= $email= $username= $password = $phno="";*/
      if($_POST)
      {
        $link=mysqli_connect("localhost","root","","tender");
        $tid = $_SESSION['tid'];
        $id = $_SESSION['id1'];
        //echo $id;
        //echo $_SESSION['id1']
        $name=$_POST["name"];
        $email=$_POST["email"];
        $description=$_POST["description"];
        $price=$_POST["price"];
        $years=$_POST["years"];
        $phno=$_POST["phno"];

        $sql1="INSERT INTO bid_tender(t_id,id,name,email,years,price,phno,description) values ('$tid','$id','$name','$email','$years','$price','$phno','$description')";

        if(!mysqli_query($link,$sql1))
        {
          echo "ERROR! Please re-check the details entered.";
        }
        else
        {

          mysqli_close($link);
          echo "Submission complete. Your bid has been submitted. We will contact you very soon. Thank you. ";
        }
      }
    ?>
  </div>
<?php endif;?>
<br>
<br>
<?php require 'footer.php' ?>