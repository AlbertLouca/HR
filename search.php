
<html>
<head>
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
</head>
<?php

$con = mysqli_connect("localhost","root","","website");
$sql = "Select faq.Question, faq.Answer 
		from faq ";
$term = $_POST['term'];
if(!empty($term)){
	$sql = $sql." WHERE Question LIKE '%$term%'
	
	or Answer LIKE '%term%'";
	
}
else {  echo "search for an item";
//h3ml display=non lel class bta3 ques:D




}

		
if($result = mysqli_query($con,$sql)){
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)){
			echo "<button class='ques' style='color:Dodgerblue'> ".$row['Question']."
			</button>
			<div class='panel'>
			<p> " .$row['Answer']."</p>
			</div>";
		}
		


		

	}
	else{
		echo "<tr><td colspan=2>No Matches Found </td></tr>";
	}
}
else{	
	echo "<tr><td colspan=2> ERROR:Could Not Able To Execute
	$sql. ".mysqli_error($con)."</td></tr>";
}
	echo"</table>";
	mysqli_close($con);
?>


</html>