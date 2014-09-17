<html>
<body>


<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);


$name=$_POST['name'] ;
$pwd=$_POST['password'];


checkdbuser($name,$pwd);
//testdb();


function testdb(){
//echo "called function, ";

// database stuff
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'testbase';



$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else {
	echo "database call successful <br><br>";

	$result = mysqli_query($con,"SELECT * FROM user");

while($row = mysqli_fetch_array($result)) {
  echo $row['name'] . " " . $row['pwd'];
  echo "<br>";
}


	}

mysqli_close($con);

}


function writetodb($name, $pwd){
echo "called function, ";

// database stuff
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'testbase';

$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else {

	$sql= "INSERT INTO user (name,pwd,signup_date) VALUES ('$name','$pwd',NOW())";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
	}
	echo "You are a new user. so we have registered you in.";


	}

mysqli_close($con);

}



function checkdbuser($name, $pwd){
//echo "called function, ";

// database stuff
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'testbase';



$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else {
	echo "database call successful <br><br>";

	$sqlnamepw="SELECT * FROM user WHERE `name` = '$name' AND pwd = '$pwd'";

	$result = mysqli_query($con,$sqlnamepw);


	if($result){
		while($row = mysqli_fetch_array($result)) {
		  echo $row['name'] . " " . $row['pwd'];
		  echo "<br>";
		}
	}else{
		writetodb($name, $pwd);
	}

	}

mysqli_close($con);

}










?>






</body>
</html>