
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.ques {
background-color: #eee;
  color: #444;
  padding: 30px;
  width: 100%;
  border: none;
  text-align: left;
  font-size: 20px;
  transition: 0.5s;
 
}



.ques:hover {
  background-color: #ccc;
}



.ques:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}


.active:after {
  content: "\2212";
  }
.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.search{
	
	
	
}
</style>
</head>

<body>
<?php session_start();include "menu.php";?>
<title>FAQ</title>
<h1 style="color:orange"><b>FAQ</h1>


  <label>Search for the FAQ:</label>
	
	<div id="msg"></div><br>
	<input name="term" type="text" id="term" onkeyup="getResult()" placeholder="Search Term ...."/>
	<div id="result"></div>





<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql="select * from faq "; 
$result=mysqli_query($conn,$sql); 
$ml=mysqli_num_rows($result); 

?>
<?php
while($rows=mysqli_fetch_assoc($result))
{

?>
<button class="ques btn btn-dark" style="color:orange"><?php echo $rows['Question']?></button>
<div class="panel ">
  <p><?php echo $rows['Answer']?></p>
</div>

<?php
}
?>





<script>
var q = document.getElementsByClassName("ques");
var i;

for (i = 0; i < q.length; i++) {
  q[i].addEventListener("click", function() {
     this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
} 
</script>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"
type="text/javascript"></script>
<script>
	function getResult()
	{
		jQuery.ajax({
			url: "search.php",
			data: 'term='+$("#term").val(),
			type: "POST",
			success: function(data2)
			{
				$("#result").html(data2);
			}
		});
	}
</script>



</body>

