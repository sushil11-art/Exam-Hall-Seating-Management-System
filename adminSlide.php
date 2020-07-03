<!-- test............. -->
<?php
  session_start();
  if (!isset($_SESSION['name'])) {
    echo "
      <script>
            alert('Please Login..');
      location.href='index.php'
      </script>
  ";
  }
?>

<!--    ------------link-------------- -->
<link rel="stylesheet" href="css/w3school.css">
<link rel="stylesheet" type="text/css" href="css/slide.css">
<script type="text/javascript" src="js/slide.js"></script>

<!------------------------- body part----------------------- -->
<!-- --------------------header----------------------------- -->
   <ul class="ul">
      <li class="li">
        <div class="togglebtn"  onclick="callsidebar()">
      <span></span>
      <span></span>
      <span></span>
      </div>
        <label class="a" style="margin-left: 40px;">
        	<a style="text-decoration: none;" href="adminHome.php">Admin Panal</a>
        </label>
      </li>  
      
      <li class="li" style="float:right">
                <a  class="a" href="logout.php"> Log-Out </a>
      </li>
  </ul>
<!-- --------------------------slide bar-------------------------------- -->
    <div id="sidebar">
      <table >
        <tr>
          <th>
            <img align="right" class="profile-img" src="image/index.png" alt="profile-img">
          </th>
          <th>
             <label class="un">Admin name :
              <?php      
                 echo $_SESSION['name']." "; 
              ?> 
           </label>
          </th>
        </tr>
     </table>
     
    <div><hr></div>
      <!-- -------------------------------option menu----------------------------------------- -->
    <div class="w3-bar-item w3-button">
        <label onclick="managestu()" class="dropbtn"> Student Info</label>
            <div id="student" class="dropdown-content">
            <a class="a" href="addStudent.php">Add Student Data</a>
            <a class="a" href="addData.php">Upload Student Data</a>
            <a class="a" href="viewData.php">View Student Data</a>
      </div>
    </div> 

    <div class="w3-bar-item w3-button">
        <label class="dropbtn" >
          <a style="text-decoration: none;" href="operationRoom.php" >Manage Room</a> </label>
    </div>


    <div class="w3-bar-item w3-button">
        <label onclick="myFunction()" class="dropbtn">Operation</label>
            <div id="myDropdown" class="dropdown-content">
            <a class="a" href="allocateseatplan.php">Allocate Seat Plan</a>
            <a class="a" href="adminViewSeatPlan.php">View Seat Plan</a>
      </div>
    </div> 

    <div class="w3-bar-item w3-button">
      <label onclick="manageinv()" class="dropbtn" >Manage Invigilator </label>
      <div id="myDro" class="dropdown-content">
          <a class="a" href="staffMng.php" >Add Invigilator</a> 
          <a class="a" href="invigilatorManage.php">View Staff Plan</a>
           </div>
          
    </div>

    </div>
    <!-- -------------------------------------------------------------------- -->
