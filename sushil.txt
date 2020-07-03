<!DOCTYPE html>
<html>
<head>
	<title>update Student Data</title>
	<style type="text/css">
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background: darkgreen;
		}
		.border{
            margin-left: 100px;
            width: 600px;
            border: 1px solid black;   
            border-radius: 10px;
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
			<p><b><u>Update Student Data</u></b></p>
	</div>
	<div class="container">
		<hr class="hr">
	</div>
	
<!-- -------------------------------------------------- -->
<?php
$host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";


  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (mysqli_connect_error()) {

	  die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	
	}

  $ID= $_GET ['id'];
  $sql="select * from stuData where roll = $ID";
  $result=mysqli_query($con,$sql);
  $row=mysqli_num_rows($result);
  $block=0;
  $room=0;
  $rw=0;
  $checked="checked";
  if ($row>0) {
  	while ($row = mysqli_fetch_array($result)) {
  		$id=$row['id'];
  		$name=$row['name'];
  		$roll=$row['roll'];
  		$eroll=$row['eroll'];
  		$gender=$row['gender'];
  		$dep=$row['dep'];
  		$sem=$row['sem'];

  	}
  }
//   // /////////////////////////////
//  			  echo "$id  ";
//       		 echo "$name  ";
//       		echo "$roll  ";
//       		 echo "$eroll  ";
//       		 echo "$gender  ";
//       		 echo "$sem  ";
//       		  echo "$dep  ";


// echo "<br>";

// 		echo ($dep=='IT')? " selected IT":"";

// 		echo ($dep=='CE')? " selected CE":"";

// 		echo ($dep=='SE')? " selected SE":"";
		
// 		echo ($dep=='it')?'selected':'' ;


// if($gender== 'f'){ echo "checked F"  ;}
// echo ($gender== 'm') ?  "checked M" : " " ;

////////////////////////////////////	
?>
<!-- -------------------------------------------------------------------------- -->
<!-- -----------------------------form------------------------------------------ -->
	<div class="border">
		<form style="margin-left: 100px;" action="DataUpdateStore.php" method="POST">
				  <input type="number" name="id"  value="<?php echo $id; ?>" hidden>
			<div class="space">
				<label>
				Student Name : <input  type="text" name="name" value="<?php echo $name;?>" required >
				</label>
			</div>
			<div class="space">
				<label>
					Rollno : <input type="number" name="roll" value="<?php echo $roll;?>" required>
				</label>
			</div>
			<div class="space">
				<label>
				Exam Roll : <input type="text" name="eroll" value="<?php echo $eroll;?>" required>
				</label>
			</div>
			<div class="space">
					<label>Gender</label>
						<label class="space"> 
						<input type="radio" name="gender" value="m" <?php echo ($gender== 'm') ?  "checked" : "" ; ?> /> Male
						</label>
						<label class="space"> 
							<input type="radio" name="gender" value="f" <?php echo ($gender== 'f') ?  "checked" : "" ; ?> /> Female
						</label>
			</div>

			<div class="space">
				<label>
					Semester : <input type="number" name="sem" value="<?php echo $sem;?>" required>
				</label>
			</div>

			<div class="space">
				<label>
					Department : 
					<select name="dep" >
						<option value=" IT" >IT-Information Technology</option>
						<option value="CE"  >CE-Computer Engineering</option>
						<option value="SE" >SE-Software Engineering</option>
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

<!-- ---------------------------------------------------------------------------- -->
	</div>
</body>
</html>