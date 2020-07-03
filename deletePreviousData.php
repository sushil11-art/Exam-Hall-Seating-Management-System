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
      

      $sql1="TRUNCATE TABLE seatplan";
      $result1=mysqli_query($con,$sql1);

       if( $result1){
                  ?>
            <script>
                window.open('adminHome.php','_self');
                </script>
                <?php
    }else {
        ?>
            <script>
                window.open('adminHome.php','_self');
                </script>
                <?php
    }
//---------------------------------------------
    $sql="TRUNCATE TABLE publish";
      $result=mysqli_query($con,$sql);

       if( $result){
                  ?>
            <script>
                window.open('adminHome.php','_self');
                </script>
                <?php
    }
?>