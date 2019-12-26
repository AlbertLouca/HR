


<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST["Submit"])){ 
	$sql="SELECT * from users 
	where Email='$_POST[Email]' and Password='$_POST[Password]'";
	$result = mysqli_query($conn,$sql);		
	if($row=mysqli_fetch_array($result))	
	{
		$_SESSION["ID"]=$row["ID"];
		$_SESSION["Fname"]=$row["Fname"];
		$_SESSION["Email"]=$row["Email"];
		
		header("Location:opor.php");
	}
	else	
	{echo'
		<script>
		alert( "Invalid Email or Password");
		</script>';
	}
}
?>
<?php include "menu.php";?>


<form  action=""  method="post"> 
<div class="form-group" >
<h1 class="centered" style="top:10%">		Login</h1>

<div class="col-sm-6"style="left:25%">
	
	<input class="form-control col-sm-6 "style="left:20%" placeholder="Email"  type="Email" name="Email" required="required">
	<br>
	</div>
	<div class="col-sm-6" style="left:25%">
	
	<input class="form-control col-sm-6"style="left:20%"placeholder="Password"  minlength="5" type="Password" name="Password" required="required">
	</div>
	<div class="col-sm-6"style="left:35%">
	Dont have an account? Click to <a class="underline" href="SignUp.php"  style="color:#990033;"> <b> Register </b></a><br>
	</div>
	<br>
	<br>
	<input class="btn btn-danger form-control col-sm-6 centered" type="submit" value="Login" name="Submit"> 
	<br>
	<br>
	<input class="btn btn-primary btn-xs form-control col-sm-6 centered" type="reset" value="Clear">
	
	</div>
</form>