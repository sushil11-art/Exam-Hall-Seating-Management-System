<!DOCTYPE html>
<html>
<head>
	<title>seat plan</title>
	<link rel="stylesheet" type="text/css" href="css/rowseatplan.css">

</head>
<body>
	  <?php include "adminSlide.php"; ?>

	<div style="margin-left: 220px; margin-top: 60px; margin-right: 100px; margin-bottom: 100px;">
		<div class="container" style="margin-left: 100px;">
			<p><b>Seat Plan</b></p>
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
?>
<!-- --------------------------------------------------------------------------- -->

		
<!-- -------------------------------------------------------------------------- -->
	<div class="container">
		<hr class="hr">
	</div>
	<div style="margin-left: 50px;">
<!-- -------------------------------------------------------------------------- -->


<?php



if (isset($_POST['OK'])){ 
	$room = $_POST['room'];

  $sem1=$_POST['sem1'];
   $sem2=$_POST['sem2'];

	$dep1 = $_POST['dep1'];
	$dep2 = $_POST['dep2'];

  $sub1=$_POST['sub1'];
  $sub2=$_POST['sub2'];

    $roomMAX=0;
    $roomMIN=0;
    $idMAX=0;
    $id=0;
    $block=0;
    $row=0;
    $col=2;
    $i=0;
    $j=0;
    $rowSUM=0;
    $studep1=0;
    $studep2=0;
    $count1=0;
    $count2=0;

	$sql1="SELECT * FROM `stuData` WHERE sem LIKE $sem1 AND dep LIKE '%$dep1%' ";
	$sql2="SELECT * FROM `stuData` WHERE dep LIKE '%$dep2%' AND sem LIKE $sem2 ";

	$result1 =  mysqli_query($con,$sql1);
	$result2 =  mysqli_query($con,$sql2);

	$row1=mysqli_num_rows($result1);
	$row2=mysqli_num_rows($result2);

   $sql3="SELECT * FROM room where roomno=$room ";
      $result3 = mysqli_query($con,$sql3);
      $row3=mysqli_num_rows($result3);
      if ($row3>0) {
                while($row3 = mysqli_fetch_array($result3)){
                    $id=$row3['id'];
               }
         }
         // end if (row3) room 
//---------------------------------------------------------------
     // $check="select ";

// ------------------save and print button-----------------------|||
         ?>
         <form action="seatplansave.php" method="POST" >
            <input type="number" name="num" value="1" hidden>
            <input type="number" name="room" value="<?php echo $room; ?>" hidden>
            <input type="text" name="dep1" value="<?php echo $dep1; ?>" hidden>
            <input type="text" name="dep2" value="<?php echo $dep2; ?>" hidden>
            <input type="text" name="sub[]" value="<?php echo $sub1; ?>" hidden>
            <input type="text" name="sub[]" value="<?php echo $sub2; ?>" hidden>
            <input type="text" name="sem[]" value="<?php echo $sem1; ?>" hidden>
            <input type="text" name="sem[]" value="<?php echo $sem2; ?>" hidden>


              <button class="save" type="submit" name="save">Save</button>
         </form>
          

         <?php
  //----------------count also----max room and min room-and id--------------------------- 
          $MAX="SELECT MAX( roomno ) as 'maxroom' FROM `room`";
          $resultMAX= mysqli_query($con,$MAX);
          $rowMAX=mysqli_fetch_array($resultMAX);
          $roomMAX=$rowMAX['maxroom'];

          $MIN="SELECT MIN( roomno ) as 'minroom' FROM `room`";
          $resultMIN= mysqli_query($con,$MIN);
          $rowMIN=mysqli_fetch_array($resultMIN);
          $roomMIN=$rowMIN['minroom'];
         
          $MAXid="SELECT MAX( id ) as 'maxid' FROM `room`";
          $resultMAXid= mysqli_query($con,$MAXid);
          $rowMAXid=mysqli_fetch_array($resultMAXid);
          $idMAX=$rowMAXid['maxid'];

        $countroomsql="SELECT COUNT(id) as 'rn' FROM room ";
        $countRoomRES=mysqli_query($con, $countroomsql);
        $countroom=mysqli_fetch_array($countRoomRES);
        $Troom=$countroom['rn'];

          
// -----------------------------total no of row-------------
          $SQL="SELECT sum( row ) as 's' FROM room ";
          $resultSum=mysqli_query($con,$SQL);
          $data=mysqli_fetch_array($resultSum);
          $rowSUM=$data['s'];
      
         
//--------------------------count total student---------------
          $countSQL1="SELECT COUNT(name) as 'stud1' FROM stuData WHERE dep LIKE '%$dep1%' AND sem LIKE $sem1 ";
          $countRES1=mysqli_query($con, $countSQL1);
          $countdep1=mysqli_fetch_array($countRES1);
          $studep1=$countdep1['stud1'];
         
          
          $countSQL2="SELECT COUNT(name) as 'stud2' FROM stuData WHERE dep LIKE '%$dep2%' AND sem LIKE $sem2 ";
          $countRES2=mysqli_query($con, $countSQL2);
          $countdep2=mysqli_fetch_array($countRES2);
          $studep2=$countdep2['stud2'];

          $totalStu=$studep1+$studep2;

// -----------------------------------------------------------------------
        $countSQL2="SELECT COUNT(id) as 'r' FROM seatplan ";
        $countRES2=mysqli_query($con, $countSQL2);
        $count2id=mysqli_fetch_array($countRES2);
        $Tid=$count2id['r'];
        $TroomEql=$Tid;
//----------------------seat plan Start----------------------------------------
    while($room>0) { 
      if (($totalStu/2)>$rowSUM) {
            echo "<br>";
            echo "seat not enough";
            echo "<br>";
            break;
       }
       if ($sub1==$sub2) {
          echo "common subject student cannot seat along";
          break;
       }
            $sql4="SELECT * FROM room where id=$id ";
            $result4 = mysqli_query($con,$sql4);
            $row4=mysqli_num_rows($result4);             

              while($row4==0) {
                   $sql4="SELECT * FROM room where id=$id ";
                   $result4 = mysqli_query($con,$sql4);
                   $row4=mysqli_num_rows($result4);
                  $id++; 
                  if ($id==$idMAX ) {
                     $id=0;
                    }   
              }
               // end while($row4==0)
            if ($row4>0) {
                while($row4 = mysqli_fetch_array($result4)){
                    $room=$row4['roomno'];
                    $block=$row4['block'];
                    $row=$row4['row'];
                    $id=$row4['id']; 
                }
            }
            // end if (row4) room 

//==============================================================

//==============================================================
//--------------------checking for reserve room--------------------

       $roomsql="select * from seatplan";
       $resultsql=mysqli_query($con,$roomsql);
       $rowsql=mysqli_num_rows($resultsql);

       $rno =array($Tid);
       $r=1;

       if($rowsql>0){
          while($rowsql = mysqli_fetch_array($resultsql)){ 
              $rno[$r]= $rowsql['roomno'];
            $r++;
          }
         }

            for ($a=1; $a<=$Tid; $a++) { 
                while ($room==$rno[$a]) {
                  $id++;
                  $sqlrno="SELECT * FROM room where id=$id ";
                  $resultrno = mysqli_query($con,$sqlrno);
                  $rowrno=mysqli_num_rows($resultrno); 

                  if ($rowrno>0) {
                  while($rowrno = mysqli_fetch_array($resultrno)){
                          $room=$rowrno['roomno'];
                      }
                     } 

                   if ($id==$idMAX ) {
                     $id=0;
                    }
                    // end of the table

                   if ($TroomEql==$Troom) {
                      break ;
                    }  

                }
                if ($TroomEql==$Troom) {
                      break ;
                    }
            }
//-------------------- all room reserve and give info about left student............
            if ($TroomEql==$Troom) {
              $c1=0;
              $c2=0;
              $c=0;
              if ($row1>0) {
                while($row1 = mysqli_fetch_array($result1)){
                        $c1++;
                }
              }

              if ($row2>0) {
                while($row2 = mysqli_fetch_array($result2)){
                        $c2++;
                }
              }
                $c=$c1+$c2;
               
                echo $c." seat are not enough...";
                echo "<br>";
                echo $c1." student of ".$dep1." department and ".$c2." student of ".$dep2." department are not allocated to exam hall seat.";
              break;
            } 



// ----------------seat plan  inifo table---------------------------
    ?>  
          <div class="container">
                <p><b>Seat Arangement</b></p>
          </div>
            <div class="seat">
              <div style="margin-left: 50px; margin-top: 20px;margin-bottom: 20px;">
                <table border="2" class="table" >
                    <tr>
                        <td colspan="2" align="center" class="td">Block : <?php echo "$block"; ?>; Room no = <?php echo $room; ?>; DEP = <?php echo $dep1; ?> & <?php echo $dep2; ?>; 
                          semester = <?php echo $sem1; ?> & <?php echo $sem2; ?> </td>
                    </tr>
                    <tr>
                        <td >column 1</td>
                        <td >column 2</td>
                    </tr>
                </table>
            <div style="float: left;">
    <?php
 /////////////////////////column=1//////////////////////////////////
     for( $i=1; $i<=$row; $i++ ) {
        for( $j=1; $j<=$col; $j++ ) {
            if ($j==1){
          ?>  
                <table  class="box" >
                    <tr>
                        <td > 
         <?php
                      if ($row1>0) {
                while($row1 = mysqli_fetch_array($result1)){
                        $name1=$row1['name'];
                        $eroll1=$row1['eroll'];
                        $count1=$count1+1;
                        echo $eroll1." ".$sub1." ".$dep1."<pre></pre>";   
                    break;
                  }
                }
            }
          else{  
         ?>
              </td>
              <td style="float: right;">
         <?php
                if ($row2>0) {
                while($row2 = mysqli_fetch_array($result2)){
                        $name2=$row2['name'];
                        $eroll2=$row2['eroll'];
                       $count2=$count2+1;
                     echo $eroll2." ".$sub2." ".$dep2."<pre></pre>";  
                break;   
               }
              }
         ?> 
                    </td>          
                 </tr>
              </table>
         <?php  
             }
            }
            //END for loop(j - columw)  closw
        ?>
            <br>
            <br>
        <?php
        }
          //END FOR loop( i - row) close
        ?>
          </div>
        <?php
  //////////////////////////column=2//////////////////////////////////////////////
         for( $i=1; $i<=$row; $i++ ) {
        for( $j=1; $j<=$col; $j++ ) {
            if ($j==1){
          ?>  
                <table  class="box" >
                    <tr>
                        <td > 
         <?php
                      if ($row1>0) {
                while($row1 = mysqli_fetch_array($result1)){
                        $name1=$row1['name'];
                        $eroll1=$row1['eroll'];
                        $count1=$count1+1;
                        echo $eroll1." ".$sub1." ".$dep1."<pre></pre>";   
                    break;
                  }
                }
            }
          else{  
         ?>
                </td>
                <td style="float: right;">
         <?php
                if ($row2>0) {
                while($row2 = mysqli_fetch_array($result2)){
                        $name2=$row2['name'];
                        $eroll2=$row2['eroll'];
                        $count2=$count2+1;
                     echo $eroll2." ".$sub2." ".$dep2."<pre></pre>";  
                break;   
               }
              }
         ?> 
                    </td>          
                 </tr>
            </table>
         <?php  
             }
            }
            //END for loop(j - columw)  closw
        ?>  
            <br>
            <br>
        <?php
        }
          //END FOR loop( i - row) close
  //////////////////////////////////////////////////////////////////////

         ?>
          </div>
        </div>

        <div class="container">
            <pre>
              
            </pre>
        </div>
    <?php
               

              if ($id==$idMAX ) {
                     $id=0;
                    }
                    // end of the table
              $a=$count1;
              $b=$count2;
              $Totalcount=$a+$b;
            if ($Totalcount== $totalStu) {
                  //  break ;
                 }
               $id++;
               $row1++;
               $row2++;
               $TroomEql++;
            }    
    	    // end while loop ($room>0)
       ?>
<!-- -------------------------------------------------------------------------------- -->
      <div class="container">
          <hr  style="margin-top: 10px;
                   height: 3px;
                   background: darkgreen;">
      </div>
 <!-- -------------------------------------------------------------------------------- -->
       <?php
 		// } 
 		// IF(ISSET) CLOSE
     mysqli_close($con);
          }
?>
  
</div>

<!-- ---------------------------------------------------------------------------------- -->

	</div>
</body>
</html>