<!DOCTYPE html>
<html>
<head>
	<title>User Detail</title>
		<link rel="stylesheet" type="text/css" href="css/userhome.css">

</head>
<body>
	 <?php include "userSlide.php";?>
	 <div style="margin-left: 220px; margin-top: 60px; margin-right: 50px; margin-bottom: 70px;">
<!------------------------------------------------------------------------------------  -->
<div class="container">
			<p><b>User Detail</b></p>
	</div>

	<div class="container">
			<hr class="hr">
	</div>

<!-- -------------------------------------------------------------- -->
<?php
  $uname=$_SESSION['uname']; 

  $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "dbphp";
  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (!$con) {
          # code...
          die("connection fail....".mysqli_connect_error());
      }
    				$name=0;
                 	$roll=0;
                 	$eroll=0;
                 	$gender=0;
                 	$dep=0;
                 	$sem=0;

    $sql="SELECT * FROM stuData where roll='$uname'";
    $result = mysqli_query($con,$sql);
       $row=mysqli_num_rows($result);
         if ($row>0) {
                 while($row = mysqli_fetch_array($result)){
                 	$name=$row['name'];
                 	$roll=$row['roll'];
                 	$eroll=$row['eroll'];
                 	$gender=$row['gender'];
                 	$dep=$row['dep'];
					 $sem=$row['sem'];
				
                 }
              }
?>
<!-- --------------------------------->
	<div class="udborder">
			<div class="space">
				<label>
					Student Name : <?php echo $name; ?>
				</label>
			</div>
			<div class="space">
				<label>
					Roll no : <?php echo "$roll"; ?>
				</label>
			</div>
			<div class="space">
				<label>
					Exam Roll : <?php echo "$eroll"; ?>
				</label>
			</div>
			<div class="space">
					<label>Gender : <?php echo "$gender"; ?></label>
			</div>

			<div class="space">
				<label>
					Semester : <?php echo "$sem"; ?>
				</label>
			</div>

			<div class="space">
				<label>
					Department : <?php echo "$dep"; ?>
				</label>
			</div>
	</div>
<!-- ////////////////////////// -->
		<div style="margin-top: 40px;">
			<hr class="hr">
	</div>

</div>
</body>
</html>