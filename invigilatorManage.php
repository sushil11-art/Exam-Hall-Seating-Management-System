
<!DOCTYPE html>
<html>
<head>
	<title>Staff Management</title>
	<link rel="stylesheet" type="text/css" href="css/staff.css">
	<script type="text/javascript" src="js/delete.js"></script>
    <style type="text/css">
	*{
		text-transsform:capatilize;
	}
	.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px dashed red;
			background: blue;
		}
		

    .button{
			float: right;
			margin-right: 20px;
			width: 100px;
            height: 48px;
            margin-top:0px;
			background-color:teal;
			color:white;
		}
        </style>
        <script type="text/javascript">
        function confDeleteAll(){
							if (confirm("Are you sure you want to delete?")) {
								location.href='deletevigi.php';
							}else{
  								location.href='invigilatorManage.php';
  							}
  						}
                          </script>
</head>
<body>
	<?php include "adminSlide.php"; ?>
    <div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">
<!-- ------------------------------------------------------------------ -->
	<div class="container">
			<p><b><u>Invigilator Plan</u></b></p>
	</div>
    <button class="button" type="submit" name="delete" onclick="confDeleteAll()">Delete All </button>
	<div class="container">
		<hr class="hr">
	</div>

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
 
?>


<div style="margin-right: 30px;">
		<table id="customers">
			<thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>Name</th>
				  		<th>Address</th>
				  		<th>Phone no</th>
						  <th>Room no</th>
						  <th>Department </th>
				  		<th>Action</th>
				  	</tr>	
			 </thead>
		<?php
			
				$sql="select * from staffdetail ";
				$result_set =  mysqli_query($con,$sql);
				if (mysqli_num_rows($result_set)>0) {
					# code...
					while($row = mysqli_fetch_array($result_set)){
		?>
					<tr style="text-transform:capitalize;">
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['phno']; ?></td>
						<td><?php echo $row['roomno']; ?></td>
						<td><?php echo $row['dep']; ?></td>
						<td>
          <button name="delete" value="delete" onClick="conformDeletestaf(<?php echo $row['id']; ?>)"> -Delete- </button>
          				</td>
					</tr>
		<?php
					}
				}
		?>
		</table>
	
</div>
<div style="margin-top: 40px;">
		<hr class="hr">
	</div>
    <label style="float: right;margin-right: 20px;">
				 <button class="save" name="print" onclick="window.print()" >Print</button> 
			</label>
  
</body>
</html>