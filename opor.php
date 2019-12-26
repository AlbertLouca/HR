<?php

session_start();

include "menu.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";



if(!isset($_SESSION['ID']))
die(" Please login first");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM users where ID=".$_SESSION["ID"];
$query_run = mysqli_query($conn,$query);
while($row=mysqli_fetch_array($query_run)) 
{
	$_SESSION['Fname']=$row['Fname'];
	$_SESSION['Email']=$row['Email'];
	$_SESSION['Lname']=$row['Lname'];
	$_SESSION['Gender']=$row['Gender'];
	$_SESSION['DOB']=$row['DOB'];
$_SESSION['job']=$row['Job'];
}


                $query = "SELECT Picture FROM users where id=".$_SESSION['ID'];  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                   
                    $_SESSION['Pic']=$row["Picture"];
                     echo '  
                          <tr>  
                               <td>  
                                    <img class="col-3 w3-circle " src='.$row["Picture"].' height="200" width="200"  />  
                               </td>  
                          </tr>  
                     ';  
                }  
              

?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="container">
 <div class="col-lg-4 col order-lg-1 text-center">
     
	
          
     
        </div>
    <div class="row">
        <div class="col-lg-8 order-lg-2">
           
		   <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
			
			
            <div class="tab-content py-4">
                <div class="tab-pane active"  id="profile">
                    <h3 class="mb-3"><?php echo $_SESSION['Fname']; ?>'s Profile</h3>
                    <div class="row">
                        <div  class="col-md-6" >
                            <h3>Position</h3>
                            <p>
              <?php  if($_SESSION['job']=="Emp"){
                   echo "Job not verified yet";}

                   else  echo $_SESSION['job'];
            ?>
                            </p>
							 <h4>First Name</h4>
                            <p>
                               <?php echo $_SESSION['Fname']; ?>
                            </p>
							 <h4>Last Name</h4>
                            <p>
                               <?php echo $_SESSION['Lname']; ?>
                            </p>
							<h4>Gender</h4>
                            <p>
                                 <?php echo $_SESSION['Gender'];?>
                            </p>	
							<h4>Email</h4>
                            <p>
                                 <?php echo $_SESSION['Email'];?>
                            </p>	
							<h4>Date of birth</h4>
                            <p>
                                 <?php echo $_SESSION['DOB'];?>
                            </p>	
							
                        </div>
                    </div>
                </div>
				
				
                <div class="tab-pane" id="edit">
					<form>
  <div class="form-group">
    <label for="FirstName">FirstName</label>
    <input type="text" class="form-control" id="FirstName" placeholder=" <?php echo $_SESSION['Fname']; ?>">
  </div>
  <div class="form-group">
    <label for="LastName">LastName</label>
    <input type="text" class="form-control" id="LastName" placeholder="  <?php echo $_SESSION['Lname']; ?>">
  </div>
   <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control" id="Email" placeholder="  <?php echo $_SESSION['Email'];?>">
  </div>
   <div class="form-group">
    <label for="Gender">Gender</label>
    <input type="text" class="form-control" id="Gender" placeholder=" <?php echo $_SESSION['Gender']; ?>">
  </div>
   <div class="form-group">
    <label for="Date Of Birth">DOB</label>
    <input type="date" class="form-control" id="Date Of Birth" placeholder=" <?php echo $_SESSION['DOB']; ?>">
  </div>
   <div class="form-group">
                                <input type="reset" class="btn btn-dark" value="Cancel">
                                <input type="button" class="btn btn-primary" value="Save Changes">
  
  
</form>
                </div>
            </div>
        </div>
       
    </div>
</div>


