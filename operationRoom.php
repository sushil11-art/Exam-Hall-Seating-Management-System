<!DOCTYPE html>
<html>
<head>
	<title>Room Managemenet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background: blue;
		}


    .space{
    margin: 10px;
    }

    .table{
		width: 100%;
		border:2px solid blue;
		font-family:cursive;
    
	}
.table-responsive{
	border:2px solid blue;
}

		.button{
			float: right;
			margin-right: 20px;
			width: 100px;
			height: 45px;
		}

	</style>
	<script type="text/javascript">
								function confirmDelete(delid){
								if (confirm("Are you sure you want to delete?")) {
									location.href='DeleteRoom.php?i='+delid+'';
								}else{
  									location.href='operationRoom.php';
  								}
  								}

  						function confDeleteAll(){
							if (confirm("Are you sure you want to delete?")) {
								location.href='roominfostore.php';
							}else{
  								location.href='operationRoom.php';
  							}
  						}

  						function confirmEdit(edid){
								if (confirm("Are you sure you want to Edit ?")) {
									location.href='roomUpdate.php?id='+edid+'';
								}else{
  									location.href='operationRoom.php';
  								}
  								}

	</script>
</head>
<body>
	<?php include "adminSlide.php"; ?>
<div style="margin-left: 220px; margin-top: 60px;">

	<div class="container" style="margin-top: 20px;">
			<p><b><u>Room Management</u></b></p>
	</div>

<!-- ---------------------------------------------------------------------------------------->
	<div class="container">
		<table border="2" class="table-responsive">
		<form action="roominfostore.php" method="POST">
			<div class="space">
				<tr >
					<td  style="width: 200px;"><label> Block   : <input type="text" name="block" required style="width:100% ;"></label> </td>
					<td colspan="2"><b>Column : 2</b></td>
				</tr>
			</div>
			<div class="space">
				<tr>
				<td>
					<label>Room no : <input type="number" name="room" required style="width: 100%;"> </label>
				</td>
				<td>
					<label>Row <input type="number"name="row" required style="width: 100%;"> </label>
				</td>
				</tr>
			</div>
				<tr>
				<div class="space">
					<td colspan="2" align="right" style="background:tomato">
					<button type="submit" name="OK" >OK</button>
					</td>
				</div>
				</tr>
		</form>
	    </table>
	</div>
<!-- --------------------------------------------------------------------------------------- -->

	<div class="container" style="margin-top: 20px;">
		<hr class="hr">
	</div>

	<div class="container">
			<p><b>Room Detail</b></p>
	</div>

<!----------------------------------------------------------------------------------------------->

<div class="container">
		<hr class="hr">
	</div>

	<div style="margin-right: 20px;">
	<div class="container">                                                                            
  <div class="table-responsive">   
  <table class="table">       
		<!-- <table border="1" id="customers"> -->
			<thead>
				<tr>
					<th>Id</th>
					<th>Block</th>
					<th>Room-No</th>
					<th>Column</th>
					<th>Row</th>
					<th>Action</th>
					<th style='background-color:red;'><button class="button" type="submit" name="delete" onclick="confDeleteAll()">Delete All </button>
					
					</th>
				</tr>
							
			
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
		
			$sql="select * from room";
			$result_set =  mysqli_query($con,$sql);
				if (mysqli_num_rows($result_set)>0) {
					# code...
					while($row = mysqli_fetch_array($result_set)){	
		?>
				<tr>
						
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['block']; ?></td>
						<td><?php echo $row['roomno']; ?></td>
						<td>2</td>
						<td><?php echo $row['row']; ?></td>
						
						<td style="color: black;">
							<!-- <a href="DeleteRoom.php?i=<?php echo $row['roomno']; ?>" >  Delete  </a> -->
							<button name="delete" value="delete"><label onClick="confirmDelete(<?php echo $row['roomno']; ?>)"> -Delete- </label>
							</button>
							<button name="edit" value="edit"><label onClick="confirmEdit(<?php echo $row['id']; ?>)"> -Edit- </label>
							</button>
						</td>
				</tr>

				<?php
			}
			// if ($block==){
			// 	echo "already taken";
			// }
		}	
	?>

			</thead>
		</table>
	</div>
	
<!-- ------------------------------------------------------------------------------------ -->
	
	<div class="container" style="margin-top: 20px;">
		<hr class="hr">
	</div>

	<?php

		

		mysqli_close($con);
	?>
	</div>
							</div>
<!-- ---------------------------------------------------------------------------------------- -->
</div>
</body>
</html>
