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
    $sql="DELETE FROM staffdetail WHERE id=$ID";
   						
    $result = mysqli_query($con,$sql);
    
    if($result){
          				?>
						<script>
        				alert('----- Deleted sucessful------');
        				window.open('staffMng.php','_self');
      					</script>
      			<?php
    }else {
       ?>
            <script>
                alert('-----Error   !!------');
                window.open('staffMng.php','_self');
                </script>
         <?php
    }

		
?>