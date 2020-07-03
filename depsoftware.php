<!DOCTYPE html>
<html>
<head>
	<title>Department Software</title>
	<link rel="stylesheet" type="text/css" href="css/department.css">
	<script type="text/javascript">
		function conformDelete(delid){
					if (confirm("Are you sure you want to delete?")) {
							location.href='DeleteSubjectSE.php?i='+delid+'';
						}else{
  							location.href='depsoftware.php';
  						}
  					}
	</script>
	</script>
</head>
<body>

<!-- -------------------------------------------------------->
	<?php include "adminSlide.php"; ?>

	<div style="margin-left: 220px; margin-top: 60px;margin-bottom: 40px;">
		<div class="container">
			<p><b><u>Manage Subject</u></b></p>
		</div>
		
<!-- ---------------------------------------------------------- -->
	<div class="container">
		<hr class="hr">
	</div>

	<div class="backgr">
		<div class="it">
			<label><a href="department.php">BE-Information Technology</a></label>
		</div>
		<div class="com">
			<label ><a href="depcomputer.php">BE-Computer</a></label>
		</div>
		<div class="sof">
			<label><a href="depsoftware.php">BE-Software</a></label>
		</div>
	</div>		

	<div class="container">
		<hr class="hr">
	</div>
<!-- =----------------------------------------------------------------------- -->
	<div class="SOFT">
			<form action="depsoftware.php" method="POST" style="text-transform:capitalize;">
				<br>
				<div id="lab"  style="text-transform:uppercase;">
					<label>Add Subject : </label>
				
					<input type="text" name="subject"  style="text-transform:uppercase;" required>
					<input type="text" name="department" value="SE" hidden>

					<label>Semester : </label>
					<input type="number" name="sem" style="text-transform:uppercase;" required>
				</div>

				<div style="margin-left: 50%;margin-top: 10px;" >
					<button type="submit" name="OK">OK</button>
				</div>
			</form>
	</div>

<!-- --------------------------------------------------------------->
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
		$sql=" ";

		if (isset($_POST['OK'])) {
			$dep=$_POST['department'];
			$sub=$_POST['subject'];
			$sem=$_POST['sem'];

			$insert="INSERT into subject(department,subject,semester) values('$dep','$sub','$sem')";
			if(mysqli_query($con,$insert)){
		  	?>
      					<script>
        				alert('successfully save');
        				window.open('depsoftware.php','_self');
      					</script>
      		<?php
		  }else{
		  	?>
      					<script>
        				alert('Error--!!!');
        				window.open('depsoftware.php','_self');
      					</script>
      		<?php
		  }
			
		}

?>
<!-- ------------------------------------------------------------------------ -->
	<br>
<!-- ------------------------------------------------------------------------ -->
	<div class="itborder">
		<table style="width: 1000px;">
			<tr>
			<td style="width: 500px;" style="text-transform:capitalize;">
				<div>
					<label><b><u>Semester : 1</u></b></label>
				</div>
			</td>
			<td>
			<div>
					<label><b><u>Semester : 2</u></b></label>
				</div>
			</td>
			</tr>
			<tr>
				<td style="text-transform:capitalize;">
		<?php
			$sql="select * from subject where department LIKE 'SE' AND semester='1' ";  
			$result_set =  mysqli_query($con,$sql);
				$count=1;
				if (mysqli_num_rows($result_set)>0) {
					while($row = mysqli_fetch_array($result_set)){	
						?>
							<div style="margin-left: 20px;font-size: 20px;">
								<?php echo $count;?> 
								.
								<label style="margin-left: 20px;font-size: 20px;"><?php echo $row['subject']; ?> </label>
								 <button name="delete" value="delete" onclick="conformDelete(<?php echo $row['id'];?>)" style="font-size: 15px;float: right;margin-right: 150px;">-Delete-</button>	
							</div>
						<?php
						$count++;
					}
				}
		?>
				</td>
				<td style="text-transform:capitalize;">
					<?php
			$sql="select * from subject where department LIKE 'SE' AND semester='2' ";  
			$result_set =  mysqli_query($con,$sql);
				$count=1;
				if (mysqli_num_rows($result_set)>0) {
					while($row = mysqli_fetch_array($result_set)){	
						?>
							<div style="margin-left: 20px;font-size: 20px;">
								<?php echo $count;?> 
								.
								<label style="margin-left: 20px;font-size: 20px;"><?php echo $row['subject']; ?> </label>	
								 <button name="delete" value="delete" onclick="conformDelete(<?php echo $row['id'];?>)" style="font-size: 15px;float: right;margin-right: 150px;">-Delete-</button>
							</div>
						<?php
						$count++;
					}
				}
		?>
				</td>
			</tr>
		</table>
	</div>

<!-- ---------------------------------------------------------------------------------- -->
</div>
</body>
</html>