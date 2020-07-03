<?php

$username = $_POST['uname'];
$password = $_POST['Password'];

    $host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "dbphp";


	$con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
   if (mysqli_connect_error()) {

	  die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	
		}
		  else{
		  	$sql="select username from loginadmin where username=? limit 1";
		  	$INSERT="INSERT INTO loginadmin(username,password) values(?,?) ";
		  	//prepare statement
					$stmt = $con->prepare($sql);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					$stmt->bind_result($username);
					$stmt->store_result();
					$rnum = $stmt->num_rows;

					if ($rnum==0) 
			 		{
						$stmt->close();
						$stmt=$con->prepare($INSERT);
						$stmt->bind_param("ss",$username,$password);
						$stmt->execute();
				
						?>
      					<script>
        				alert('successfully save');
        				window.open('adminHome.php','_self');
      					</script>
      					<?php

					}else
					{

						?>
						<script>
        				alert('Already Used Username');
        				window.open('admin-signup.php','_self');
      					</script>
      					<?php

					}
					$stmt->close();
					$con->close();
	
				}
?>
