<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		.hr{
			margin-top: 10px;
			margin-left: 20px;
			margin-right: 20px;
			height: 3px;
			background: darkgreen;
		}
		 .title{
			font-size: 20px;
			
			font-weight: bold;
			margin-top: 20px;
		}
		.border{
			margin-right: 50px;
			border: 2px solid black;
			height: 400px;
		}
		.space{
			margin: 10px;
		}
		.img{
			float: right;
			margin-left: 50px;
			margin-top: 40px;
			
		}
		#form{
			/* margin-left: 350px; */
			margin-top: 35px;
			font-size: 15px;

		}
	</style>
	<script type="text/javascript" src="js/allocateseatplan.js"></script>
</head>
<body>
		  <?php include "adminSlide.php"; ?>
		  <div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">

	<ul class="start">
		<li>
			<div class="container">
				<h1 class="title" style="margin-left: 300px;"><p><b>Row seat plan management</b></p></h1>
			</div>
		</li>
	</ul>

	<div class="container">
		<hr class="hr">
	</div>
<!-- -------------------------------------------------------------------------- -->
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

        $countSQL2="SELECT COUNT(id) as 'r' FROM seatplan ";
        $countRES2=mysqli_query($con, $countSQL2);
        $count2=mysqli_fetch_array($countRES2);
        $Tid=$count2['r'];

   $roomsql="select * from seatplan";
   $resultsql=mysqli_query($con,$roomsql);
   $rowsql=mysqli_num_rows($resultsql);

   $rno =array($Tid);
   $i=1;

    if($rowsql>0){
    while($rowsql = mysqli_fetch_array($resultsql)){ 
    		$rno[$i]= $rowsql['roomno'];
    		$i++;
		}
	}

		

?> 

<!-- ---------------------------------------------------------------------- -->
	<div class="border">
		<div style="margin-top: 20px; font-size: 15px;">
				<label><b><u>Row Seat Plan</u></b></label><hr style="border:1px solid blue;">
		</div>
		<div class="img">
			<!-- <div >
				<img src="image/hor.png">
			</div> -->
		</div>
<!-- -----------------------------form --------------------------------------->
		<div id="form">
			  <form  action="rowseatplan.php" method="POST">
				 <div class="space">
					<label>Start room-no : 
						<select name="room" required style="width: 150px;text-transform:capatilize;">
							<option value="">Room no</option>
			<?php	
							$sql="SELECT roomno,block FROM room ";
							$result=mysqli_query($con,$sql);
							$row=mysqli_num_rows($result);
							if($row>0){
							while($row = mysqli_fetch_array($result)){
								$room=$row['roomno'];

								$reserve=0;
								for ($a=1; $a<=$Tid; $a++) { 
									if($rno[$a]==$room){
										$reserve=1;;
									}
								}
            ?>
                    <option value="<?php echo $row['roomno']; ?>" <?php if($reserve == 1) {
                    	//if ($roomonSP!=$room && $rowremain!=0) {
                    		echo "disabled";
                    	//}
                    } ?> >
            <?php 
              			echo $row['roomno'];
              			if ($reserve == 1) {
              				echo "  -  Reserve";
              			}
            ?>  
               		</option>
               			<?php   						
             				  }
							}
						?>
						</select>

						<!-- <input type="number" name="room" required >-->     
					 </label> 
				</div>

				<div class="space">
					<label width:100%;>Department :
						<select name="dep1" id="dep1" required="required"  onclick="subject1()">
							<option value="">Select Department</option>
							<option value="IT">IT</option>
							<option value="SE">SE</option>
							<option value="CE">CE</option>
						</select>
						 &
						 <select name="dep2" id="dep2" required="required"  onclick="subject2()">
							<option value="">Select Department</option>
							<option value="IT">IT</option>
							<option value="SE">SE</option>
							<option value="CE">CE</option>
						</select>

					<!--  <input type="text" name="dep1" id="dep1" required> & <input type="text" name="dep2" id="dep2" required></label> -->

				</div>

				<div class="space">
					 <label> Semester : 
                		<input type="number" name="sem1" id="sem1" required style="width: 150px; text-transform:capitalize;" onclick="subject1()" > & 
               			 <input type="number" name="sem2" id="sem2" style="width: 150px; text-transform:capitalize;" required onclick="subject2()" >   
          			</label>
				</div>
<!------ ------------------value of department ,semester and subject------ -->
				
	 <?php 	
	$d=1;
	$sem=500;
	$sub=1000;
	    $countSQL1="SELECT COUNT( id) as 'i' FROM subject ";
        $countRES1=mysqli_query($con, $countSQL1);
        $count1=mysqli_fetch_array($countRES1);
        $totalid=$count1['i'];

			$sql="SELECT * FROM subject";
			$result=mysqli_query($con,$sql);
			$row=mysqli_num_rows($result);
			for ($i=1; $i <=$totalid; $i++) { 
				if($row>0){
					while($row = mysqli_fetch_array($result)){
	?>
	<input type="text" id="<?php echo $d; ?>" value="<?php echo $row['department']; ?>" hidden>
	<input type="text" id="<?php echo $sem; ?>" value="<?php echo $row['semester']; ?>" hidden>
	<input type="text" id="<?php echo $sub; ?>" value="<?php echo $row['subject']; ?>" hidden>
	<?php
						break;
					}
				}
				$d++;
				$sem++;
				$sub++;
			}
	?>

	<input type="text" name="idpass" id="id" value="<?php echo $totalid; ?>" hidden> 

        		<div class="space">
         			<label>Subject : 
         			 <select name="sub1" id="s1"  style="width: 150px;"required></select>

         			 </select>
         			 		&
         			 <select name="sub2" id="s2"  style="width: 150px;"required>
					 
         			 </select>
         			</label>
       			 </div>

				<div class="space">
					<button type="submit" name="OK" style="margin-left: 35%;">OK</button>
				</div>

			</form>
		</div>
	</div>
<!-- -------------------------------------------------------------------------------- -->
</div>

</body>
</html>