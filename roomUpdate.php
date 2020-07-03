<!DOCTYPE html>
<html>
<head>
	<title>Update Room</title>
	<style type="text/css">
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background: darkgreen;
		}


    .space{
    margin: 10px;
    }

    .table{
    	width: 400px;
    	margin-left: 250px;
    }
	</style>
</head>
<body>
	<?php include "adminSlide.php"; ?>
<div style="margin-left: 220px; margin-top: 60px;">

	<div class="container" style="margin-top: 20px;">
			<p><b>Room Management</b></p>
	</div>

	<div class="container" style="margin-left: 200px;">
			<p><b>Room Update</b></p>
	</div>
<!-- -------------------------------------------------- -->
<?php
$host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (mysqli_connect_error()) {

	  die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
	
	}

  $ID= $_GET ['id'];
  $sql="select * from room where id=$ID";
  $result=mysqli_query($con,$sql);
  $row=mysqli_num_rows($result);
  $block=0;
  $room=0;
  $rw=0;
  if ($row>0) {
  	while ($row = mysqli_fetch_array($result)) {
  		$id=$row['id'];

  		$block=$row['block'];
  		$room=$row['roomno'];
  		$rw=$row['row'];
  	}
  }

?>
<!-- -------------------------------------------------- -->
	<div class="container">
		<table border="1" class="table">
		<form action="roomUpdateStore.php" method="POST">
					  <input type="number" name="id"  value="<?php echo $id; ?>" hidden>

			<div class="space">
				<tr >
					<td  style="width: 200px;"><label> Block   : <input type="text" name="block" value="<?php echo $block; ?>" required style="width: 60px;"></label> </td>
					<td colspan="2" align="center">column : 2</td>
				</tr>
			</div>
			<div class="space">
				<tr>
				<td>
					<label>Room no : <input type="number" name="room"  value="<?php echo $room; ?>" required style="width: 100px;"> </label>
				</td>
				<td>
					<label>Row <input type="number"name="row" value="<?php echo $rw; ?>" required style="width: 60px;"> </label>
				</td>
				</tr>
			</div>
				<tr>
				<div class="space">
					<td colspan="2" align="center">
					<button type="submit" name="OK" >OK</button>
					</td>
				</div>
				</tr>
		</form>
	    </table>
	</div>

	<div class="container" style="margin-top: 20px;">
		<hr class="hr">
	</div>
<!-- -------------------------------------------------- -->
</div>
</body>
</html>