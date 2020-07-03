
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
                        <th class="th">Semester</th>
                        <th class="th">Subject</th>
                    		<th class="th">Dep1</th>
                    		<th class="th">StartRoll</th>
                    		<th class="th">EndRoll</th>
                    		<th class="th">Dep2</th>
                    		<th class="th">StartRoll</th>
                    		<th class="th">EndRoll</th>
                        
                    	</b>
                    	</tr>
      	<?php
                while($row = mysqli_fetch_array($result)){
                    $i=$row['id'];
                    $block=$row['block'];
                    $room=$row['roomno'];
                    $sem=$row['sem'];
                    $dep1=$row['dep1'];
                    $start1=$row['start1'];
                    $end1=$row['end1'];
                    $dep2=$row['dep2'];
                    $start2=$row['start2'];
                    $end2=$row['end2'];
                    $sub=$row['sub'];
 // ---------------------------------------------------------------------                   
                    ?>
                    
                    	<tr>
                    		<td><?php echo $block; ?></td>
      <td onclick="viewRoom(<?php echo $room; ?>)" > <?php echo $room; ?> </td>
                        <td><?php echo $sem; ?></td>
                        <td><?php echo $sub; ?></td>
                    		<td><?php echo $dep1; ?></td>
                    		<td><?php echo $start1; ?></td>
                    		<td><?php echo $end1; ?></td>
                    		<td><?php echo $dep2; ?></td>
                    		<td><?php echo $start2; ?></td>
                    		<td><?php echo $end2; ?></td>
                    	</tr>
                   
                    <?php
                   
// ---------------------------------------------------------------------
               }
               ?>
               		 </table>
               <?php
         }
         

?>