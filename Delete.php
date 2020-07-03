<?php
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (mysqli_connect_error()) {

	  die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	
	}

// ------------------------delete particular data--------------
	$ID= $_GET ['id'];
    $sql="DELETE FROM stuData WHERE roll=$ID";
   						
    $result = mysqli_query($con,$sql);
    
    if($result){
          				?>
						<script>
        				alert('----- Deleted sucessful------');
        				window.open('viewData.php','_self');
      					</script>
      					<?php
    }else {
        echo "ERROR";
    }

		
?>