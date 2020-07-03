
<!---------------------------------------------------------------------- -->
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

	if (isset($_POST['OK'])){ 

		$block=$_POST['block'];
		$room=$_POST['room'];
		$row=$_POST['row'];

		  	$INSERT="INSERT INTO room(block,roomno,row) values('$block','$room','$row')";
		  if(mysqli_query($con,$INSERT)){
		  	?>
      					<script>
        				alert('successfully save');
        				window.open('operationRoom.php','_self');
      					</script>
      		<?php
		  }else{
		  	?>
      					<script>
        				alert('Error--!!!');
        				window.open('operationRoom.php','_self');
      					</script>
      		<?php
		  }
		  $con->close();
		}

		
// ----------------------------------------------------------------------
			$sql="TRUNCATE TABLE room";
			mysqli_query($con,$sql);
			?>
      					<script>
        				alert('successfully Deleted All Room');
        				window.open('operationRoom.php','_self');
      					</script>
      		<?php
		
		  	
	?>