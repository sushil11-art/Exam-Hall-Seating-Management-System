<?php
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (mysqli_connect_error()) {

	  die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	
	}
	

	$ID= $_GET ['i'];
    $sql="DELETE FROM subject WHERE id = $ID ";
   						
    $result = mysqli_query($con,$sql);
    
    if($result){
          				?>
						<script>
        				alert('----- Deleted sucessful------');
        				window.open('department.php','_self');
      				</script>
      					<?php
    }else {
        ?>
            <script>
                alert('-----Error   !!------');
                window.open('department.php','_self');
              </script>
       <?php
    }

    
		
?>