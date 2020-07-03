
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

		$id=$_POST['id'];
		$name=$_POST['name'];
		$roll=$_POST['roll'];
		$eroll=$_POST['eroll'];
		$gender=$_POST['gender'];
		$dep=$_POST['dep'];
	    $s=$_POST['sem'];

//UPDATE `studata` SET `stu_name`='sajan sajan',`rollno`=1234,`eroll`='AA1234',`gender`='d',`department`='uk',`semester`='0' WHERE `id`=1;
       
		// $sql="UPDATE stuData SET name='$name',`roll`=$roll,`eroll`='$eroll',`gender`='$gender',`department`='$dep',`semester`='$s' WHERE `id`=$id;";
		$sql="UPDATE * in stuData";


		  $result=mysqli_query($con,$sql);
		  if($result){
		  	?>
      					<script>
        				alert('Successfully  Update ');
        				window.open('viewData.php','_self');
      					</script>
      		<?php
      		//  echo "$id  ";
      		//  echo "$name  ";
      		// echo "$roll  ";
      		//  echo "$eroll  ";
      		//  echo "$gender  ";
      		//  echo "$dep  ";
      		//  echo "$s  ";


		  }else{
		  	?>
      					<script>
        				alert('Error--!!');
        				window.open('viewData.php','_self');
      					</script>
      		<?php
      		
    
		  }



		  mysqli_close($con);
		}

?>