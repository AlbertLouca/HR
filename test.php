
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php session_start();include "menu.php";
include "database.php";?>


<?
$sql="Select * from users where id='".$_SESSION['ID']."'";
$check= mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($check)) 
{
	$_SESSION['Fname']=$row['Fname'];
	$_SESSION['Email']=$row['Email'];
	$_SESSION['Lname']=$row['Lname'];
	$_SESSION['Gender']=$row['Gender'];
    $_SESSION['DOB']=$row['DOB'];
    $_SESSION['Pic']=$row['Picture'];

    print_r( $_SESSION['Pic']);
 
}

?>

</head>
<body>


<h1 class="centered" style="top:10%">		Profile</h1>

<form class="" action="" enctype="multipart/form-data" method="post">




</form>





</body>

