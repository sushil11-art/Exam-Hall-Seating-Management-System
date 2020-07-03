<!DOCTYPE html>
<html>
<head>
	<title>Generate Attendent Seat</title>
	<style type="text/css">
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background: darkgreen;
		}
		.table{
			margin-left: 50px;
			width: 800px;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.border{
			border: 1px solid black;
			border-radius: 15px;
			width: 900px;
			margin-left: 100px;
		}
	</style>
</head>
<body>
	<?php include "adminSlide.php"; ?>
	<div style="margin-left: 220px; margin-top: 60px; margin-right: 10px; margin-bottom: 50px;">
<!-- /------------------------------- -->
<table style="width: 100%;">
	<tr>
		<td>
			<label><p><b>Attendent Seat</b></p></label>
		</td>
		<td>
			<label style="float: right;margin-right: 20px;">
				 <button class="save" name="print" onclick="window.print()" >Print</button> 
			</label>
		</td>
	</tr>
</table>
<div class="container">
			<hr class="hr">
</div>
<!-- ------------------------------ -->
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

		$id=$_GET['id'];

		$sql="SELECT * from seatplan where id=$id ";
		 $result = mysqli_query($con,$sql);
     	$row=mysqli_num_rows($result);
      	if ($row>0) {
                while($row= mysqli_fetch_array($result)){
                    $id=$row['id'];
                  
					$block= $row['block']; 
			    	$room= $row['roomno']; 
					$sem= $row['sem']; 
					$dep1= $row['dep1']; 
					$start1= $row['start1'];
					$end1= $row['end1'];
					$dep2= $row['dep2'];
					$start2= $row['start2'];
					$end2= $row['end2'];
					$sub= $row['sub']; 
						 
					$se=explode(",", $sem);//string to array
					$subj=explode(" & ", $sub);//string to array
// --------------------------------------------------------
	?>
		<div class="border" style="margin-top: 70px;">
			<table border="2" class="table">
				<tr style="text-transform:capitalize;">
					<td colspan="4" align="center"> Exam Hall Attendent</td>
				</tr>
				<tr style="text-transform:capitalize;">
					<td colspan="4" align="center">
						Block : <?php echo "$block"; ?>; Roll no = <?php echo $room; ?>; DEP = <?php echo $dep1; ?>; semester = <?php echo $sem; ?>; subject = <?php echo $sub; ?>
					</td>
				</tr>
				<tr>
                        <td colspan="3">Student Name</td>
                        <td >Signature</td>
                </tr>
    <?php
   
    		while($start1<=$end1){
    			$sql=" SELECT name from stuData where eroll=$start1";
    			$result = mysqli_query($con,$sql);
     			$row=mysqli_num_rows($result);
      			if ($row>0) {
                	while($row= mysqli_fetch_array($result)){
                		$name=$row['name'];
    ?>
				<tr>
					<td colspan="3"><?php echo $name;?>   <?php echo $start1;?>
					</td>
					<td></td>
				</tr>
    <?php
                	}
                }
                $start1++;
            }

    ?>
			</table>
		</div>
<!-- ------------------------------------------------------------------ -->

		<div class="border" style="margin-top: 50px;">
			<table border="2" class="table">
				<tr>
					<td colspan="4" align="center"> Exam Hall Attendent</td>
				</tr>
				<tr style="text-transform:capitalize;">
					<td colspan="4" align="center">
						Block : <?php echo "$block"; ?>; Roll no = <?php echo $room; ?>; DEP = <?php echo $dep2; ?>; semester = <?php echo $sem; ?>; subject = <?php echo $sub; ?>
					</td>
				</tr>
				<tr>
                        <td colspan="3">Student Name</td>
                        <td >Signature</td>
                </tr>
    <?php
   
    		while($start2<=$end2){
    			$sql=" SELECT name from stuData where eroll=$start2";
    			$result = mysqli_query($con,$sql);
     			$row=mysqli_num_rows($result);
      			if ($row>0) {
                	while($row= mysqli_fetch_array($result)){
                		$name=$row['name'];
    ?>
				<tr>
					<td colspan="3"><?php echo $name;?>   <?php echo $start2;?>
					</td>
					<td></td>
				</tr>
    <?php
                	}
                }
                $start2++;
            }

    ?>
			</table>
		</div>
	<?php

//=--------------------------------------------------------------------
               }
         }

?>

<div style="margin-top: 60px;">
			<hr class="hr">
</div>
<!-- ----------------------------- -->
	</div>
</body>
</html>