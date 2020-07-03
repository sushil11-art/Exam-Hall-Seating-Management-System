<!DOCTYPE html>
<html>
<head>
	<title>Add Student Data</title>
	<style type="text/css">
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background:royalblue;
		}
		.border{
            margin-left: 100px;
            width: 600px;
            border: 1px dashed purple;   
            border-radius: 10px ;
        }
        .space{
    		margin: 10px;
		}
	</style>
</head>
<body>
	<?php include "adminSlide.php"; ?>
	<div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">
<!-- -----------------------------top--------------------------------------- -->
	<div class="container">
			<p><b><u><h3>Add Student Data</u></b></p></h3>
	</div>
	<div class="container">
		<hr class="hr">
	</div>
<!-- -----------------------------form------------------------------------------ -->
	<div class="border">
		<form style="margin-left: 100px;" action="addStudent.php" method="POST">
			<div class="space">
				<label>
					Student Name : <input  type="text" name="name" required >
				</label>
			</div>
			<div class="space">
				<label>
					Roll no : <input type="number" name="roll" required>
				</label>
			</div>
			<div class="space">
				<label>
					Exam Roll : <input type="number" name="eroll" required>
				</label>
			</div>
			<div class="space">
					<label>Gender</label>
						<label class="space"> <input
							 type="radio" name="gender" value="m" checked="checked" > Male
						</label>
						<label class="space"> <input
							 type="radio" name="gender" value="f"> Female
						</label>
			</div>

			<div class="space">
				<label>
					Semester : <input type="number" name="sem" required>
				</label>
			</div>

			<div class="space">
				<label>
					Department : <select name="dep" required="required">
									<option value=" IT">IT-Information Technology</option>
									<option value="CE">CE-Computer Engineering</option>
									<option value="SE">SE-Software Engineering</option>
								 </select>
				</label>
			</div>
			<div class="space" align="center">
					<button type="submit" name="submit">Submit</button>
				</div>
		</form>
	</div>

	<div class="container" style="margin-top: 20px;">
		<hr class="hr">
	</div>
<!-- ---------------------------------php----------------------------------------- -->

<?php

 $host = "localhost";
		$dbusername = "root";
 		$dbpassword = "";
 		$dbname = "dbphp";

	    $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

	    if (!$con) {
			   	# code...
			   	die("connection fail....".mysqli_connect_error());
			   }

	if (isset($_POST['submit'])){ 

		$name=$_POST['name'];
		$roll=$_POST['roll'];
		$eroll=$_POST['eroll'];
		$gender=$_POST['gender'];
		$depart=$_POST['dep'];
		$s=$_POST['sem'];
		
       
		$sql="insert into stuData(name,roll,eroll,gender,dep,sem) values('$name','$roll','$eroll','$gender','$depart','$s');";
		  if(mysqli_query($con,$sql)){
		  	?>
      					<script>
        				alert('Successfully Save');
        				window.open('addStudent.php','_self');
      					</script>
      					<?php
		  }
		  $con->close();
		}

?>
<!-- ---------------------------------------------------------------------------- -->
	</div>
</body>
</html>