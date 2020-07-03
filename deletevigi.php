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
 $sql="TRUNCATE TABLE staffdetail";
			mysqli_query($con,$sql);
			?>
      					<script>
        				alert('Successfully Deleted All ');
        				window.open('invigilatorManage.php','_self');
      					</script>
                         