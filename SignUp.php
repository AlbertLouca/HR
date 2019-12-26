<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
.centered {
  position: fixed;
 
  left: 40%;
 
  transform: translate(-50%, -50%);
}
body {
	
	background-image: url("hr2.jpg");
}
.custom-file-upload {
   
    cursor: pointer;
}

</style>
</head>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);



if(isset($_POST["Submit"])){ 
	if(!empty($_POST['Email']))
	
	{
		$sql="select * from users where Email='$_POST[Email]'";
		$check= mysqli_query($conn,$sql);
		if(!$row=mysqli_fetch_array($check))   //check email used
		{
          if($_POST['Password']!=$_POST['RPassword'])  // passwords doesnt match
			{
				echo "<script>alert('Passwords doesnt match')</script>";
			}
			else{
        $uploaddir = 'profiles/';
        $dir=$uploaddir.$_FILES["pic"]["name"];
        move_uploaded_file($_FILES["pic"]["tmp_name"],$dir);
        

			
			$sql="INSERT INTO users(Fname,LName,Email,Password,Gender,DOB,Picture)
			values ('$_POST[Fname]','$_POST[LName]','$_POST[Email]','$_POST[Password]'
			,'$_POST[1]','$_POST[dat]','$dir')";
				$result=mysqli_query($conn,$sql);
			if($result)	
			{
			header("Location:home.php");
			}
			else
			{
			echo $sql;
			}
			}
	    	}
        	else echo "<script>alert('Email already Used')</script>";
		
	     }
      }
?>

<?php include "menu.php";
include_once "database.php";?>


<form class="" action="" enctype="multipart/form-data" method="post">
<div class="form-group  ">

<h1 class="centered" style="top:10%">		Join Us</h1>
<div class="form-group row">
<div class="col-sm-6">
 <b>First Name : </b><br>
  <input class="form-control" type="text" name="Fname" required="required">
  </div>
  <div class="col-sm-6">
  <b>Last Name : </b><br>
 
  <input class="form-control" type="text" name="LName" required="required">
 </div>
 <div class="col-sm-6">
<b> Upload your Picture : </b> <br>
<div class=" black input-group mb-3">
<input id="pic"  name="pic" type="file" class="custom-file-input "> 
<label class="custom-file-label" for="pic">Choose file</label>


</div>

</div>

<div class="col-sm-6">

 <b> Email :</b><br>
  <input class="form-control" type="email" name="Email" required="required">
  </div>	
  <div class="col-sm-6">
 <b> Password :</b><br>
  <input class="form-control" minlength="5" type="Password" name="Password" required="required">
  </div>
  <div class="col-sm-6">
 <b> Retype Password :</b><br>
  <input class="form-control" minlength="5" type="Password" name="RPassword" required="required">
  </div>
  <div class="col-sm-6">
  <b> Birthdate :</b><br>
  <input class="form-control"  type="date" name="dat" required="required">
  </div>
  <div class="col-sm-6">
  <br>
  <input   type="radio" name="1" value="Male" checked> Male
 <input  type="radio" name="1" value="Female"> Female
 </div>
 </div>
 <div class="col-sm-3  centered">
 Already a Member? Click to <a href="Login.php" > <b> Login </b></a><br>
  </div>
  <br>
  <br>
  <input class="btn btn-danger form-control col-sm-6 centered" type="submit" value="Submit" name="Submit">
  <br>
  <br>
  <input class="btn btn-primary form-control col-sm-6 centered " type="reset">
  </div>
</form>

<script>
    $(document).ready(function(){
        $("#repassword").keyup(function(){
             if ($("#Password").val() != $("#repassword").val()) {
                 $("#pass").css("color","red").css("display","block");
                 $("#conf").css("color","green").css("display","none")

             }if ($("#Password").val() == $("#repassword").val()){
                 $("#conf").css("color","green").css("display","block");
                 $("#pass").css("color","red").css("display","none");
            }

      });
});
</script>