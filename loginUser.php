<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title>Login User</title>
<style type="text/css">
body,html {
    background-image: url('https://i.imgur.com/xhiRfL6.jpg');
    height: 100%;
}

#profile-img {
    height:180px;
}
.h-80 {
    height: 80% !important;
}
  </style>    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body  >

   <?php include 'header.php'; ?> 
    

<form class="myform" action="loginUser.php" method="POST">
<div class="container h-80">
<div class="row align-items-center h-100">
    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form  class="form-signin">
                
        
						
					
						<input type="text" name="name" class="form-control" placeholder="Your Roll No" required autofocus>
                <!-- <input type="password" name="pass" id="inputPassword" class="form-control form-group" placeholder="Password" required autofocus> -->
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login" >Enter</button>
            </form>
        </div>
    </div>
</div>
</div>
</form>
    
  </div>

  
</body>
</html>


<?php

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if (isset($_POST['login'])) {
    $uname=$_POST['name'];
  
    // $pass=$_POST['pass'];

    // $uname=pawan;
    // $pass=pawan;
    

     session_start();
    $_SESSION['uname']=$uname;

    $sql="select * from stuData where roll='$uname'";
    $run=mysqli_query($con,$sql);
    $row=mysqli_num_rows($run);

    if($row == 1){
      if ($_SESSION['uname'] == true) {

      echo "
      <script>
      alert('You are sucessfully login..');
      location.href='userHome.php';
      </script>";

     } 
}else{
    	?>
      <script>
        alert('Not registered ! !');
        window.open('loginUser.php','_self');
      </script>
      <?php
    }

   
}

?>