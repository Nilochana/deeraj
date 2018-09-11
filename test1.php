<?php
session_start();
?>
<html>
<style>
form
{
	padding: 10px;
}
h2
{
	padding: 10px;
}

input[type=search]
{
	width: 50%;
	padding: 12px 20px 12px 40px;
	font-size: 16px;
}

input[type=submit]
{
	width: 10%;
	padding: 12px;
	font-size: 16px;
}

</style>
<h2> Search for a particular record (enter first name)</h2>
<br>
<form method="post">
<input type="search" placeholder ="Search..." required name="first">
<br>
<br>
<input type="submit" value="Submit">
</form>
<?php
if($_POST)
{
	$first=$_POST["first"];
	$conn=mysqli_connect("localhost","root","","test");
	$sql="SELECT * from loltest where firstname ='$first'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count<1)
	{
		echo "No name exists";
	}
	else if($result)
	{
		while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
		{
			echo "First name: {$row['firstname']} <br>".
			"Last name: {$row['lastname']} <br>".
			"Gender: {$row['gender']} <br>".
			"E-mail ID: {$row['email']} <br>".
			"Phone number: {$row['phno']} <br>";
		}
	}
	mysqli_close($conn);
}
?>
</html>