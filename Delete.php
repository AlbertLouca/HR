<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";
session_start();

$conn =new mysqli($servername, $username, $password, $dbname);

$sql="delete from employee where ID=".$_SESSION["ID"] ;
$result=mysqli_query($conn,$sql);
if($result)
{
	session_unset();
session_destroy();
	
	header("Location:home.php");
}
else
{
	alert( "error deleting");
}
		
?>