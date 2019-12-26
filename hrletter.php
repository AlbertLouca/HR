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


.topright {
  float: right;
  padding-right:15px;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: red;}





</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Edit el mail php -->


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$lol="select * from letters where  ID='window.realID'";
$result = mysqli_query($conn, $lol);
    $row = mysqli_fetch_array($result);

   


if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<div class="formhidden" id="editform">

<span onclick='CloseForm()' class="topright" >x</span>
<form enctype="multipart/form-data" action=""  method="post" class="formshown "  >


Letter Type: <select class="custom-select" STYLE="width:20%" name="selection" >

<?
     
	 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql="select * from subjects" ;

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
       
            
            
           
       
        while($row = mysqli_fetch_array($result)){
            if($row['Name']==$edit['Name'])
                echo "<option value=" . $row['Name'] . "selected >" . $row['Name'] . "</option>";
                echo "<option value=" . $row['Name'] . " >" . $row['Name'] . "</option>";
              
        
        }
		echo "</select>";
    
        
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
<br>
Priority:&ensp;&ensp;&ensp;&ensp;
<?
if($edit['Priority']=="MOD")
echo'Moderate<input type="radio" name="1" value="MOD" checked> ';
?>
Moderate<input type="radio" name="1" value="MOD" > 
<?
if($edit['Priority']=="MAJ")
echo'Major <input type="radio" name="1" value="MAJ" checked>';
?>
Major <input type="radio" name="1" value="MAJ"> 
<?
if($edit['Priority']=="CRIT")
echo'Critical <input type="radio" name="1" value="CRIT" checked> ';
?>
Critical <input type="radio" name="1" value="CRIT"> <br>

<textarea class="btn-dark mb1 black bg-gray" minlength="10" placeholder="Description" required="required" rows="10" cols="90" name="mail"></textarea><br>
<div class=" black input-group mb-3">
<input id="pic"  name="pic" type="file" class="custom-file-input "> 
<label class="custom-file-label" for="pic">Choose file</label>
</div>
<div class="centered">
<button type="submit" class="btn btn-primary "  name="send">Send</button>
<button type="reset" id="Reset" class="btn btn-danger ">Reset</button>
</div>




</form>
</div>






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
<div id="side-nav-choose"  style="width:300px" class="col" >

  <a class="btn btn-dark tablinks " onclick="opentab(event, 'Sent')" id="defaultOpen" href="#Sent"><b>Sent</b> <span class="badge badge-primary badge-pill"> <?= $countsent  ?></span></a>
  
  <a class="btn btn-dark tablinks " onclick="opentab(event, 'inbox')"href="#Inbox"><b>Inbox</b> <span class="badge badge-primary badge-pill"><?= $countinbox ?></span></a>
 <br><br><br> <button  id="Compose" onclick="openForm()" style="font-size:18px" type="button" class="col btn btn-dark">Compose</button> 
  
</div>
<br>

<div class="formhidden" id="EmailForm">

<span onclick=CloseForm() class="topright" >x</span>
<form enctype="multipart/form-data" action=""  method="post" class="formshown "  >


Letter Type: <select class="custom-select" STYLE="width:20%" name="selection" >

<?php
     
	 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql="select * from subjects";

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
       
            
            
           
       
        while($row = mysqli_fetch_array($result)){
            
                echo "<option value=" . $row['Name'] . " >" . $row['Name'] . "</option>";
              
              
        
        }
		echo "</select>";
    
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
<br>
Priority:&ensp;&ensp;&ensp;&ensp;
Moderate<input type="radio" name="1" value="MOD" checked> 
Major <input type="radio" name="1" value="MAJ"> 
Critical <input type="radio" name="1" value="CRIT"> <br>

<textarea class="btn-dark mb1 black bg-gray" minlength="10" placeholder="Description" required="required" rows="10" cols="90" name="mail"></textarea><br>
<div class=" black input-group mb-3">
<input id="pic"  name="pic" type="file" class="custom-file-input "> 
<label class="custom-file-label" for="pic">Choose file</label>
</div>
<div class="centered">
<button type="submit" class="btn btn-primary "  name="send">Send</button>
<button type="reset" id="Reset" class="btn btn-danger ">Reset</button>
</div>




</form>
</div>

<div id='Sent' class="tabcontent">
 <?php
     
	 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql="select ID, Subject,Priority,Date from letters where Shown=0 and Sender='".$_SESSION['ID']."' order by Date desc,Priority";

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-hover'>";
            echo "<thead class='thead-dark' ><tr>";
                echo "<th>Subject</th>";
                echo "<th>Priority</th>";
                echo "<th>Date</th>";
            
            echo "</tr>  </thead>";
        while($row = mysqli_fetch_array($result)){
            echo '<tr onclick="edit('.$row['ID'].' ) " >';
            
                echo "<td>" . $row['Subject'] . "</td>";
                if($row['Priority']=="CRIT"){
                echo "<td class='bg-danger'     id='OpenElForm' onclick='isa()'>" . $row['Priority'] . "</td>";}
                if($row['Priority']=="MAJ"){
                    echo "<td class='bg-warning'>" . $row['Priority'] . "</td>";}
                    if($row['Priority']=="MOD"){
                        echo "<td class='bg-info'>" . $row['Priority'] . "</td>";}




                echo "<td>" . substr($row['Date'],0, 19) .  "</td>";
              
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


function openForm() {
  document.getElementById("EmailForm").style.display = "block";
  document.getElementById("Compose").setAttribute("onClick","javascript:CloseForm()");
}





function CloseForm() {
  document.getElementById("EmailForm").style.display = "none";
  document.getElementById("Compose").setAttribute("onClick","javascript:openForm()");
}




function edit($id){

var realID ;

realID=  $id;
document.getElementById("OpenElForm").setAttribute("onClick","javascript:isa()");

}
function isa(){

  document.getElementById("editform").style.display = "block";


} 


</script>


</html>