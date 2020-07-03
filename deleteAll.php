<?php
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (mysqli_connect_error()) {

	  die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	
	}
// -------------------------delete all-------------------
      $sql="TRUNCATE TABLE stuData";
      $result=mysqli_query($con,$sql);
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