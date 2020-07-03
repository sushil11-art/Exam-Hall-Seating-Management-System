

<?php
$host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (mysqli_connect_error()) {

	  die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	
	}

	if (isset($_POST['OK'])){ 
		$id=$_POST['id'];
		$block=$_POST['block'];
		$room=$_POST['room'];
		$rw=$_POST['row'];

		  	// $INSERT="INSERT INTO room(block,roomno,row) values('$block','$room','$row')";
		$sql="UPDATE `room` SET block='$block',roomno='$room',row='$rw' WHERE id=$id ";
		$result=mysqli_query($con,$sql);
		  if($result){
		  	?>
      					<script>
        				alert('Successfully Room Update Save');
        				window.open('operationRoom.php','_self');
      					</script>
      		<?php
		  }else{
		  	?>
      					<script>
        				alert('Error--!!');
        				window.open('operationRoom.php','_self');
      					</script>
      		<?php
		  }
		  
		}
mysqli_close($con);
?>