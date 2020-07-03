
<!-- ------------------------------------------------------------------->
<?php	
// echo "------------START----------------------------";
//  echo "<br>";
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

  if (!$con) {
          # code...
          die("connection fail....".mysqli_connect_error());
      }


if (isset($_POST['save'])){ 

		$value=$_POST['num'];
      // echo "  string  ";

		if ($value==1) {
			// echo "value=".$value;
			// echo "<br>";
// ***************************************************************************************
			$room = $_POST['room'];

			$dep1 = $_POST['dep1'];
			$dep2 = $_POST['dep2'];

      $semst=$_POST['sem'];
      $sem=implode(",", $semst);//array to string
      $subj=$_POST['sub'];
      $sub=implode(" & ", $subj);

       $se=explode(",", $sem);//string to array
		// echo "===================";
		// echo "$room  ";
		//    echo " $dep1 ";
	  //    echo " $dep2 ";
 	  //    echo "===========================";
    //    echo "<br>";
    // echo "$se";
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
    $start1=0;
    $start2=0;
    $end1=0;
    $end2=0;

$sql1="SELECT * FROM `stuData` WHERE dep LIKE '%$dep1%' AND sem LIKE $se[0]";
$sql2="SELECT * FROM `stuData` WHERE dep LIKE '%$dep2%' AND sem LIKE $se[1]";

	$result1 =  mysqli_query($con,$sql1);
	$result2 =  mysqli_query($con,$sql2);

	$row1=mysqli_num_rows($result1);
	$row2=mysqli_num_rows($result2);

      $sql3="SELECT * FROM room where roomno =$room ";
      $result3 = mysqli_query($con,$sql3);
      $row3=mysqli_num_rows($result3);
      if ($row3>0) {
                while($row3 = mysqli_fetch_array($result3)){
                    $id=$row3['id'];
                    $block=$row3['block'];
                    $room=$row3['roomno'];
               }
         }
         // end if (row3) room 
 //---------------------max room and min room--alos count----------------- 
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
          $countSQL1="SELECT COUNT(name) as 'stud1' FROM stuData WHERE dep LIKE '%$dep1%'  AND sem LIKE $sem[0] ";
          $countRES1=mysqli_query($con, $countSQL1);
          $countdep1=mysqli_fetch_array($countRES1);
          $studep1=$countdep1['stud1'];

          $countSQL2="SELECT COUNT(name) as 'stud2' FROM stuData WHERE dep LIKE '%$dep2%'  AND sem LIKE $sem[0] ";
          $countRES2=mysqli_query($con, $countSQL2);
          $countdep2=mysqli_fetch_array($countRES2);
          $studep2=$countdep2['stud2'];

            $totalStu=$studep1+$studep2;
  // --------------------------------------------------
        $countSQL2="SELECT COUNT(id) as 'r' FROM seatplan ";
        $countRES2=mysqli_query($con, $countSQL2);
        $count2=mysqli_fetch_array($countRES2);
        $Tid=$count2['r'];
        $TroomEql=$Tid;

// ------------------------seat plan start---------------------------------
    while($room>0) { 

        if (($totalStu/2)>$rowSUM) {
            echo "<br>";
            echo "alert(seat not enough---!!)";
            echo "<br>";
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

                  if ($TroomEql==$Troom) {
                      break ;
                    } 

                  if ($id==$idMAX ) {
                     $id=0;
                    }
                    // end of the table
                }
                if ($TroomEql==$Troom) {
                      break ;
                    } 
            }
//-------------------- all room reserve and give info about left student............
            if ($TroomEql==$Troom) {
              break;
            } 



// ----------------seat plan  inifo table---------------------------
//////////////////////////////////column=1///////////////////////////////////////////
    for( $i=1; $i<=$row; $i++ ) {
        for( $j=1; $j<=$col; $j++ ) {
            if ($i==1 && $j==1){
         
                      if ($row1>0) {
                while($row1 = mysqli_fetch_array($result1)){
                        $name1=$row1['name'];
                        $eroll1=$row1['eroll'];
                        $start1=$eroll1;
                        $end1=$eroll1;
               
                      //  echo $eroll1,$name1,$dep1."<pre></pre>";   
                    break;
                  }
                }
            }
          elseif ($i==1 && $j==2) {
                if ($row2>0) {
                while($row2 = mysqli_fetch_array($result2)){
                        $name2=$row2['name'];
                        $eroll2=$row2['eroll'];
                        $start2=$eroll2;
                        $end2=$eroll2;
                    // echo $eroll2,$name2,$dep2."<pre></pre>";  
                    break;   
                   }
                 }
               }
          elseif ($j==1) {
                   if ($row1>0) {
                while($row1 = mysqli_fetch_array($result1)){
                  $name1=$row1['name'];
                        $eroll1=$row1['eroll'];
                        $end1=$eroll1;
                    break;
                  }
                }
              }
          elseif ($j==2) {
                if ($row2>0) {
                while($row2 = mysqli_fetch_array($result2)){
                  $name2=$row2['name'];
                        $eroll2=$row2['eroll'];
                        $end2=$eroll2;
                    break;   
                   }
                 }
              }


            }
            //END for loop(j - columw)  closw
        }
          //END FOR loop( i - row) close
        
  //////////////////////////column=2//////////////////////////////////////////////
         for( $i=1; $i<=$row; $i++ ) {
        for( $j=1; $j<=$col; $j++ ) {

          if($j==1){
               if ($row1>0) {
                while($row1 = mysqli_fetch_array($result1)){
                  $name1=$row1['name'];
                        $eroll1=$row1['eroll'];
                        $end1=$eroll1;
                    break;
                  }
                }
          }
          else{
                if ($row2>0) {
                while($row2 = mysqli_fetch_array($result2)){
                  $name2=$row2['name'];
                        $eroll2=$row2['eroll'];
                        $end2=$eroll2;
                    break;   
                   }
                 }
              }
            }
            //END for loop(j - columw)  closw    
        }
          //END FOR loop( i - row) close
//////////////////////////////////////////////////////////////////////////////
         
            $insert="INSERT into seatplan (block,roomno,sem,dep1,start1,end1,dep2,start2,end2,sub) 
            		values('$block','$room','$sem','$dep1','$start1','$end1','$dep2','$start2','$end2','$sub') ";
            $res=mysqli_query($con,$insert);
            if($res){
		  		?>
      					<script>
        				alert('--successfully save--');
        				window.open('allocateseatplan.php','_self');
      					</script>
      			<?php
		  	}else{
          ?>
                <script>
                alert('--Error---!!--');
                window.open('allocateseatplan.php','_self');
                </script>
            <?php
        }

            if ($id==$idMAX ) {
                     $id=0;
                    }
                    // end of the table

            if ($row1['eroll']==NULL && $row2['eroll']==NULL) {
                   break ;
                 }

               $id++;
               $TroomEql++;
              
            }    
    	    // end while loop ($room>0)
    	    echo "<br>";     
// ***************************************************************************************
		}
    //if ($value==1)
	}
   //end if(isset) 
?>
<!-- ---------------------------------------------------->
