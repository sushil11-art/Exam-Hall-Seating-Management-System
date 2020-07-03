<!DOCTYPE html>
<html>
<head>
	<title></title>		

	<link rel="stylesheet" type="text/css" href="css/viewData.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/delete.js">
	</script>


</head>
<body>


		  <?php include "adminSlide.php"; ?>
		  <div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">

     <ul class="start">
		<li>
			<div class="container">
				<a href="viewData.php" class="title"> View Student Data</a>
					<button class="button" type="submit" name="delete" onclick="confirmDeleteAll()">Delete_All</button>
			</div>
		</li>
		<li>
	
    	<div style="float: right;margin-right: 20px;height: 40px; ">
    		<form action="viewData.php" method="post">
				<div class='search-container'>
    			<label style="height: 40px;"><input type="text" name="search" placeholder="  Enter student name"  style="height: 40px; border-radius:20px">
    			</label>
    			<button type="submit" name="submit"  style="height: 40px;" ><i class="fa fa-search"></i></button>
			</form>
</div>
		</div>


		</li>
	</ul>
<!-- ------------------------------------------------------------- -->
	
<div class="backgr">
	<div class="it">
		<label>IT-Information Technology</label>
	</div>
	<div class="ce">
		<label>CE-Computer Engineering</label>
	</div>
	<div class="se">
		<label>SE-Software Engineering</label>
	</div>
</div>
<!-- ------------------------------------------------------------ -->

	<div class="container">
		<hr class="hr">
	</div>

	<div style="margin-right: 20px;">
	<div class="container">                                                                            
  <div class="table-responsive">   
  <table class="table">       
 	<thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>Student Name</th>
				  		<th>Rollno</th>
				  		<th>Exam_Roll</th>
				  		<th>Gender</th>
				  		<th>Department</th>
				  		<th>Semester</th>	
				  		<!-- <th>Action</th>	 -->
				  	</tr>	
					  </thead>

		</div>
</div>

			<?php

			    $dbHost = "localhost";
			    $dbDatabase = "root";
			    $dbPassword = "";
			    $db = "dbphp";
			   $conn = mysqli_connect($dbHost,$dbDatabase,$dbPassword,$db);

			   if (!$conn) {
			   	# code...
			   	die("connection fail....".mysqli_connect_error());
			   }
//---------------------------------------------------
			   $Search=0;
			   if (isset($_POST['submit'])){ 

			   $Search++;
               $name=$_POST['search'];
               
               	// $i=1;	
                $sql="SELECT * FROM stuData WHERE name like '%$name%' ";
				$result_set =  mysqli_query($conn,$sql);
				if (mysqli_num_rows($result_set)>0) {
					while($row = mysqli_fetch_array($result_set)){
				?>
					<tr style="text-transform:capitalize;">
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['roll']; ?></td>
						<td><?php echo $row['eroll']; ?></td>


						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['dep']; ?></td>
						<td><?php echo $row['sem']; ?></td>
						<td>
          				<button name="delete" value="delete"><label onClick="confirmDelete(<?php echo $row['roll']; ?>)"> -Delete- </label></button>

		  				<button name="edit" value="edit"><label onClick="confirmEdit(<?php echo $row['roll']; ?>)"> -Edit- </label>
							</button>
						</td>
</div>
					</tr>
	
				<?php

					}
				}
			   }
			   

//------------------------------------------------------------
           	if($Search==0){
				$id=1;
   				 $sql="select * from stuData ";
				$result_set =  mysqli_query($conn,$sql);
				if (mysqli_num_rows($result_set)>0) {
					# code...
					while($row = mysqli_fetch_array($result_set)){
				?>
				<style type="text/css">
				td
{
    padding:0 15px;
}
</style>

					<tr style="text-transform:capitalize;" >
						<td><?php echo $row['id'] ?></td> 
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['roll']; ?></td>
						<td><?php echo $row['eroll']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['dep']; ?></td>
						<td><?php echo $row['sem']; ?></td>
						<!-- <td>
						<button name="delete" value="delete"><label onClick="confirmDelete(<?php echo $row['roomno']; ?>)"> -Delete- </label>
							</button>
		  				<button name="edit" value="edit"><label onClick="confirmEdit(<?php echo $row['rollno']; ?>)"> -Edit- </label>
							</button>
						</td> -->

					</tr>
				<?php
					}
				}

		}
				mysqli_close($conn);
				
			?>
		</table>
	</div>
	<div style="margin-top: 20px;">
		<hr class="hr">
	</div>
</div>
</div>
</body>
</table>
</html>