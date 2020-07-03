<!------------ chech session-------- -->
<?php
  session_start();
  if (!isset($_SESSION['uname'])) {
    echo "
      <script>
            alert('please login..');
      location.href='loginUser.php'
      </script>
  ";
  }
?>

<!--    ------------link-------------- -->
<link rel="stylesheet" href="css/w3school.css">
<link rel="stylesheet" type="text/css" href="css/slide.css">
<script type="text/javascript" src="js/slide.js"></script>

<!------------- body part------- -->
<!-- --------------------header----------------------------- -->
   <ul class="ul">
      <li class="li">
        <div class="togglebtn"  onclick="callsidebar()">
      <span></span>
      <span></span>
      <span></span>
      </div>
       <label class="a" style="margin-left: 40px;">
        <a href="userHome.php" style="text-decoration: none;"> User Panal</a>
      </li>  
      
      <li class="li" style="float:right">
                <a  class="a" href="logout.php"> Log-Out </a>
      </li>
  </ul>
<!-- --------------------------slide bar-------------------------------- -->
    <div id="sidebar" >
      <table >
        <tr>
          <th>
            <img align="right" class="profile-img" src="image/prof.png" alt="">
          </th>
          <th>
             <label class="un">user name :
              <?php  
                  
                 echo $_SESSION['uname']." "; 
              ?> 
           </label>
          </th>
        </tr>
     </table>
     
    <div><hr></div>
  <!-- -------------------------------option menu----------------------------------------- -->

    <!-- <div class="w3-bar-item w3-button">
     <label class="dropbtn" style="padding: 16px;">profile </label>
    </div> -->

     <div class="w3-bar-item w3-button">
      <label onclick="myFunction()" class="dropbtn">Option</label>
        <div id="myDropdown" class="dropdown-content">
         <a href="userViewSeatPlan.php">View Seat Plan</a>

       </div>
    </div>      
    </div>
<!-- ---------------------------------------------------------------------------> 