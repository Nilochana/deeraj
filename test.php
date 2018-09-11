<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>

<h3>Using CSS to style an HTML Form</h3>

<div>
  <form action="test.php" method="post">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    
  
    <input type="submit" value="Submit">
  </form>

     <?php
     /* $name= $email= $username= $password = $phno="";*/
      if($_POST)
      {
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        
        $link=mysqli_connect("localhost","root","","test123");
        $sql="INSERT INTO user(first_name, last_name) values ('$firstname','$lastname')";
        $result = mysqli_query($link,$sql);
        if(!$result)
        {
         echo "ERROR! Please re-check the details entered.";
        }
        else
        {
         echo "Sign Up complete.";
        }
        mysqli_close($link);
      }
    ?>
</div>


</div>

</body>
</html>
