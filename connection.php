
<?php
		$username = "root";
		$password = "";
		$hostname = "localhost"; 
		$dbname = "test123";

		//connection to the database
		$dbhandle = mysqli_connect($hostname, $username, $password, $dbname) 
		or die("Unable to connect to MySQL");
?>

