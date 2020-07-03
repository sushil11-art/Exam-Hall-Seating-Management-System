
<!DOCTYPE html>
<html>
<head>
	<title>Staff Management</title>
	<link rel="stylesheet" type="text/css" href="css/staff.css">
	<script type="text/javascript" src="js/delete.js"></script>
</head>
<body>
	<?php include "adminSlide.php"; ?>
<div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">
<!-- ------------------------------------------------------------------ -->
	<div class="container">
			<p><b><u>Invigilator Detail</u></b></p>
	</div>
	<div class="container">
		<hr class="hr">
	</div>
<!-- ----------------------------------------------------------------- -->

	<div class="backgr">
		<div class="it">
			<label><a href="#">BE-Information Technology</a></label>
		</div>
		<div class="com">
			<label ><a href="#">BE-Computer</a></label>
		</div>
		<div class="sof">
			<label ><a href="#">BE-Software</a></label>
		</div>
	</div>		

	<div class="container">
		<hr class="hr">
	</div>
<!-- ------------------------------------------------------------------- -->
	<div class="border">
		<form action="staffMng.php" method="POST">
			<div class="space">
				<label>
					 Name : <input  type="text" name="name" required style="width: 270px;">
				</label>
			</div>
			<div class="space">
				<label>
					Address : <input type="text" name="address" required="required" style="width: 255px;">
				</label>
			</div>
			<div class="space">
				<label>
					Phone number : <input type="number" name="phno" required>
				</label>
			</div>
			<div class="space">
				<label>
					Room no : <input type="number" name="roomno" required>
				</label>
			</div>

			<div class="space">
				<label>
					Department : 
					<input type="checkbox" name="dep[]" value="IT" > IT 
					<input type="checkbox" name="dep[]" value="SE" > SE    
					<input type="checkbox" name="dep[]" value="CE" > CE       
				</label>
			</div>
			<div class="space">
				<button type="submit" name="submit" style="margin-left: 40%;">Submit</button>
			</div>
		</form>
	</div>

	<div style="margin-top: 20px;">
		<hr class="hr">
	</div>
<!-- ------------------------------------------------------------------- -->
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
		$address=$_POST['address'];
		$phno=$_POST['phno'];
		$roomno=$_POST['roomno'];
		$dep=$_POST['dep'];
		$department=implode(",", $dep);

			$INSERT="INSERT into staffdetail(name,address,phno,roomno,dep) values('$name','$address','$phno','$roomno','$department')";

		if(mysqli_query($con,$INSERT)){
			?>
      					<script>
        				alert('successfully save');
        				window.open('staffMng.php','_self');
      					</script>
      		<?php
		}else{
			?>
      					<script>
        				alert('Error   !!!');
        				window.open('staffMng.php','_self');
      					</script>
      		<?php
		}
	}
	?>



<!-- ------------------------------------------------------------------ -->
</div>
			
</body>
</html>
