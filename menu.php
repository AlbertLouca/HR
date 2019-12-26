

<html>
<? session_start();

?>
	<head>

	
	 <title>WhirlPool</title>
	<link rel="icon" href="hr-staff.jpg">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>	<style>
		body {
			
				background-image: url("hr2.jpg");
 background-color: #cccccc;

 
		}
		.centered {
  position: fixed;
  
  left: 50%;

  transform: translate(-50%, -50%);
}
		.logo{
			border:none;
			
		}
			.topnav{
				
				
				overflow:hidden;
				color: black	;
				font-size: 17px;
				padding: 14px 14px;
			}
			.topnav a{
				
				font-weight: bold;
				float:right;
				display:block;
				color: white;
				background-color: white;
				border:2px solid black;
				text-align: center;
				padding: 6px 12px;
				text-decoration: none;
				font-size: 17px;
			}
		
			a:hover{
				
			
				color: orange;
			}
			
			a:active{
				
			
				color: orange;
			}

			#log
			{
				border:none; float:left; 
				background-color:transparent;
				
			}
			
		</style>
	</head>
	<body>		

		<div class="topnav " >
		
			<?php
				if(!empty($_SESSION['ID'])) 
				{
					echo '<a  id="log"  href="home.php"><img src="WhirlpoolCorp-2017Logo_2C_B.png" 
					style="width:200px; height:60px" title="HR" alt="HR"></a>';
					
					echo"<a class='bg-dark' href='SignOut.php'>SignOut</a>";
					echo "<a class='bg-dark' href='opor.php' >".$_SESSION['Fname']."</a>";  //1
					echo "<a class='bg-dark' href='FQA2.php' > <i class='far fa-question-circle' ></i> FAQ</a>";  //2 
					
					
					
					echo "<a class='bg-dark' href='hrletter.php' ><i class='fas fa-mail-bulk' style='font-size:22px'></i>  HR Letter</a>"; //3 
					echo"<a class='bg-dark' href='home.php'><i class='fas fa-home' ></i> Home</a>";  
					
				}
				else
				{
					echo '<a   id="log"  href="home.php"><img src="WhirlpoolCorp-2017Logo_1C_W.png" 
					style="width:200px; height:60px" title="HR" alt="HR"></a>';
					
					
					
					
						echo "<a class='bg-dark' href='FQA2.php' ><i class='far fa-question-circle' ></i> FAQ</a>";
					echo"<a class='bg-dark' href='home.php'><i class='fas fa-home' ></i> Home</a>";
				
					echo"<a class='bg-dark' href='SignUp.php'>Join Us</a>";
					echo"<a class='bg-dark' href='Login.php'>Login</a>";
					
					
				}
				
				?>
				
		</div>
		<br><br>
	</body>
</html>