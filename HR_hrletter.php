<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php


session_start(); include "menu.php";

if(!isset($_SESSION['ID']))
die(" Please login first");




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

if($conn = new mysqli($servername, $username, $password, $dbname))
	
if(isset($_POST["send"]))
{ $d=date("Y-m-d H:i:s");
    
 $b=$_FILES['pic']['tmp_name'];
 
	$q="INSERT INTO letters (Sender,Subject,Priority,Description,Date,Attachment ) 
    values('$_SESSION[ID]','$_POST[selection]','$_POST[1]','$_POST[mail]','$d','$b')";
   mysqli_query($conn,$q);
	   
   

}
?>

<style>

.table-hover {
	
	background-color:white;
	
}

.custom-file-upload {
   
    cursor: pointer;
}


.custom-select select {
  display: none; 

}
.formhidden {

display:none;
bottom:0;

position:fixed;
left:370px;
  top:120px;
height:100%;
width: 65%;
}

.formshown{

background-color:white;
border: 3px solid black;
left:10px;
  top:100px;	

padding:30px;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
  .tablinks {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: grey;

  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}







</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Edit el mail php -->







<?php
     
	 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);


$result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `letters` WHERE Sender='".$_SESSION['ID']."' and   Shown='0'");
$row = mysqli_fetch_array($result);
$countsent = $row['count'];



$result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `letters` WHERE Sender='".$_SESSION['ID']."' and  Shown !='NULL'");
$row = mysqli_fetch_array($result);
$countinbox = $row['count'];


?>
<div id="side-nav-choose"  style="width:350px" class="row-sm-5 col" >

  <a class="btn btn-dark tablinks " onclick="opentab(event, 'Pending')" id="defaultOpen" href="#Pending"><b>Pending</b> <span class="badge badge-primary badge-pill"> <?= $countsent  ?></span></a>
  <a class="btn btn-dark tablinks " onclick="opentab(event, 'inbox')"href="#Inbox"><b>Completed</b> <span class="badge badge-primary badge-pill"><?= $countinbox ?></span></a>
 <br><br><br> 
</div>
<br>
<div id='Pending' class="tabcontent">
 <?php
     
	 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql="select l.ID, l.Subject,l.Priority,u.Fname,l.Date from letters l inner join users u on l.Sender= u.ID where Shown=0 and Sender='".$_SESSION['ID']."' order by Date desc,Priority";

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($result = mysqli_query($conn, $sql)){



    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-hover'>";
            echo "<thead class='thead-dark' ><tr>";
               echo "<th>Sender</th>";
                echo "<th>Subject</th>";
             
                echo "<th>Priority</th>";
                echo "<th>Date</th>";
                echo "<th>Action</th>";
            echo "</tr>  </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<td>" . $row['Fname'] . "</td>";
                echo "<td>" . $row['Subject'] . "</td>";
                if($row['Priority']=="CRIT"){
                echo "<td class='bg-danger'     id='OpenElForm' >" . $row['Priority'] . "</td>";}
                if($row['Priority']=="MAJ"){
                    echo "<td class='bg-warning'>" . $row['Priority'] . "</td>";}
                    if($row['Priority']=="MOD"){
                        echo "<td class='bg-info'>" . $row['Priority'] . "</td>";}




                echo "<td>" . substr($row['Date'],0, 19) .  "</td>";
                echo "<td><button  class='btn btn-success'  name='send'>Accept</button>  &#160;      <button  class='btn btn-danger'  name='send'>decline</button> </td> ";
                
            echo "</a></tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 
 </div>
 <div id='inbox' class="tabcontent">
 <?php
     
	 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$con = new mysqli($servername, $username, $password, $dbname);

$sql="select Subject,Priority,Date from letters where Shown!=0 and Sender='".$_SESSION['ID']."' order by Date desc";

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-hover'>";
            echo "<thead class='thead-dark' ><tr>";
                echo "<th>Subject</th>";
                echo "<th>Priority</th>";
                echo "<th>Date</th>";
            
            echo "</tr>  </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
           
                echo "<td>" . $row['Subject'] . "</td>";
                if($row['Priority']=="CRIT"){
                    echo "<td class='bg-danger'>" . $row['Priority'] . "</td>";}
                    if($row['Priority']=="MAJ"){
                        echo "<td class='bg-warning'>" . $row['Priority'] . "</td>";}
                        if($row['Priority']=="MOD"){
                            echo "<td class='bg-info'>" . $row['Priority'] . "</td>";}
                echo "<td>". substr($row['Date'],0, 19) . "</td>";
              
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{

}
?>


 </div>
 <div class="formhidden" id="EmailForm"> 
 <div style="background-color:solid black "onclick="this.parentElement.style.display='none'" >

</div>


 

<script>
function opentab(evt, tabname) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabname).style.display = "block";
  evt.currentTarget.className += " active";
  
}


document.getElementById("defaultOpen").click();














</script>


</html>