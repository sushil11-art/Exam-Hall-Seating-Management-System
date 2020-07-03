<!DOCTYPE html>
<html>
<head>
	<title>view seat plan</title>
	<style type="text/css">
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background: darkgreen;
		}
		.th{
            width: 100px;
            height: 20px;
            text-align: center;
            
        }
        .seat{
        	border: 1px solid black ;
   			 border-radius: 10px;
   			     margin-left:50px;
   			     width: 600px;

        }
	</style>
  <script type="text/javascript" src="js/view.js"></script>

</head>
<body>
	<?php include "adminSlide.php"; ?>
<!-- -------------------------------------- -->

	<div style="margin-left: 220px; margin-top: 60px; margin-right: 10px; margin-bottom: 50px;">
		<table style="width: 100%;">
			<tr>
				<td>
					<p><b>View seat plan</b></p>
				</td>
				
				<td>
          <label style="float: right;margin-right: 20px;">
                <button class="save" name="print" onclick="window.print()" >Print</button> 
           </label>
					<form action="adminViewSeatPlan.php" method="post">
						<button style="float: right; margin-right: 20px;" name="button" value="1">publish seat plan</button>
					</form>
				</td>
			</tr>
<!-- ------------------------- -->
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
		if (isset($_POST['button'])) {
		$pubval=$_POST['button'];
		$sql="insert into publish(publish) value($pubval)";
		if(mysqli_query($con,$sql)){
		  	?>
      					<script>
        				alert('successfully publish');
        				window.open('adminViewSeatPlan.php','_self');
      					</script>
      		<?php
		  }
	}
?>
<!-- ------------------------ -->
		</table>
		
		<div class="container">
			<hr class="hr">
		</div>
<!-- -------------------------------------- -->
<div style="margin-left: 20px;">
	
<!-- -------------------------------------- -->
  
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

		  $MAXid="SELECT MAX( id ) as 'maxid' FROM `room`";
          $resultMAXid= mysqli_query($con,$MAXid);
          $rowMAXid=mysqli_fetch_array($resultMAXid);
          $idMAX=$rowMAXid['maxid'];



  $sql="SELECT * FROM `seatplan`";
  $result= mysqli_query($con,$sql);
      $row=mysqli_num_rows($result);
      if ($row>0) {
      	?>
      				<table border="1">
                    	<tr><b>
                    		<th class="th">Block</th>
                    		<th class="th">Room</th>
                        <th class="th">Semesters</th>
                        
                    		<th class="th">Dep1</th>
							<th class="th">Subjects</th>
                    		<th class="th">StartRoll</th>
                    		<th class="th">EndRoll</th>
							<!-- <th class="th">Sem2</th> -->
                    		<th class="th">Dep2</th>
                    		<th class="th">StartRoll</th>
                    		<th class="th">EndRoll</th>
							<!-- <th class="th">Subject2</th> -->
                    		<th class="th">Generaate</th>

                        
                    	</b>
                    	</tr>
      	<?php
                while($row = mysqli_fetch_array($result)){
                    $i=$row['id'];
                    $block=$row['block'];
                    $room=$row['roomno'];
					$sem=$row['sem'];
					
					$dep1=$row['dep1'];
					$sub=$row['sub'];
                    $start1=$row['start1'];
					$end1=$row['end1'];
					// $sem2=$row['sem2'];
                    $dep2=$row['dep2'];
                    $start2=$row['start2'];
                    $end2=$row['end2'];
					
					// $sub2=$row['sub2'];
 // ---------------------------------------------------------------------                   
                    ?>
                    
                    	<tr>
                    		<td><?php echo $block; ?></td>
      <td onclick="viewRoom(<?php echo $room; ?>)" > <?php echo $room; ?> </td>
                        	<td><?php echo $sem;?></td>
							<td><?php echo $dep1; ?></td>
                    		<td	><?php echo $sub;?></td>
							<td><?php echo $start1; ?></td>
                    		<td><?php echo $end1; ?></td>
							<!-- <td><?php echo $sem1;?></td> -->
                    		<td><?php echo $dep2; ?></td>
                    		<td><?php echo $start2; ?></td>
                    		<td><?php echo $end2; ?></td>
							<!-- <td><?php echo $sub2;?></td> -->
                        <td style="font-size: 11px;"><button onclick="generate(<?php echo $i; ?>)">Attendent Seat</button></td>
                    	</tr>
                   
                    <?php
                   
// ---------------------------------------------------------------------
               }
               ?>
               		 </table>
               <?php
         }
         

?>
</div>
<!-- ------------------------------------ -->
	</div>
</body>
</html>