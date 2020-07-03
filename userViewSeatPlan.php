<!DOCTYPE html>
<html>
<head>
  <title>User View Seat Plan</title>
  <style type="text/css">
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background: darkgreen;
		}
		.th{
            width: 100px;
            height: 20px;
            text-align: center;
            
        }
        .seat{
        	border: 1px solid black ;
   			 border-radius: 10px;
   			     margin-left:50px;
   			     width: 600px;
        }
	</style>
	  <!-- <script type="text/javascript" src="js/viewRoom.js"></script> -->

</head>
<body>
	<?php include "userSlide.php"; ?>
  	<div style="margin-left: 220px; margin-top: 60px; margin-right: 50px; margin-bottom: 50px;">
<!-- ----------------------------------------------------------------------------------------- -->
    <div class="container">
			<p><b>View seat plan</b></p>
	</div>

	<div class="container">
			<hr class="hr">
	</div>
<!-- --------------------------------- -->
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
		
		$pubvalue=0;

		$sql="select publish from publish";  
		$result_set =  mysqli_query($con,$sql);
		if (mysqli_num_rows($result_set)>0) {
			while($row = mysqli_fetch_array($result_set)){
				$pubvalue=$row['publish'];
			}
		}

?>

	<?php 
      if ($pubvalue==1) {
      	 include "viewSeatPlan.php";
      }
      else{
      	echo "seat plan not publish---";
      }
	    ?>

<!-- ............................. -->
	</div>
</body>
</html>