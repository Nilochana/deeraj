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
<br>    
<?php else : ?> 
<br>
<br>
<div class="tender-container tender-padding-32" id="contact">
    <h3 class="tender-border-bottom tender-border-light-grey tender-padding-12">Add Tender</h3>
    <p>Enter the appopriate details to add your tender.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input class="tender-input" type="number" placeholder="ID = <?php echo $_SESSION['id1']; ?>" required="required" name="id">
      <input class="tender-input" type="text" placeholder="Organisation Name" required="required" name="name">
      <input class="tender-input tender-section" type="email" placeholder="Email" required="required" name="email">
      <label>Type: </label>
      <input type="radio" name="type" value="Office"> Office Building
  	  <input type="radio" name="type" value="School"> School
      <input type="radio" name="type" value="Mall"> Mall<br>
  	  <input class="tender-input tender-section" type="text" placeholder="Description" required name="description">
      <input class="tender-input tender-section" type="text" placeholder="Area" required name="area">
  	  <input class="tender-input tender-section" type="number" placeholder="Registeration Price" required name="price">
  	  <input class="tender-input tender-section" type="number" placeholder="Approx. Time Period" required name="years">
      <input class="tender-input tender-section" type="number" placeholder="Contact Number" required="required" name="phno">

      <button class="tender-btn tender-section" type="submit">
        <i class="fa fa-paper-plane"></i> Submit
      </button>
    </form>

    <?php
      
     /* $name= $email= $username= $password = $phno="";*/
      if($_POST)
      {
        $id=$_POST["id"];
        //echo $id;
        //echo $_SESSION['id1'];
        if($_SESSION['id1'] === $id)
        {
          $name=$_POST["name"];
          $email=$_POST["email"];
          $type=$_POST['type'];
          $description=$_POST["description"];
          $area=$_POST["area"];
          $price=$_POST["price"];
          $years=$_POST["years"];
          $phno=$_POST["phno"];

          $link=mysqli_connect("localhost","root","","tender");
          $sql="INSERT INTO add_tender(id,name,email,type,description,area,price,years,phno) values ('$id','$name','$email','$type','$description','$area','$price','$years','$phno')";
          if(!mysqli_query($link,$sql))
          {
            echo "ERROR! Please re-check the details entered.";
          }
          else
          {
            mysqli_close($link);
            echo "Submission complete. Your tender has been added. We will contact you very soon. Thank you. ";
          }
        }
        else
        {
          echo "Please enter the right ID.";
        }

      }
    ?>
  </div>
</div>
<?php endif;?>
  <?php require 'footer.php' ?>