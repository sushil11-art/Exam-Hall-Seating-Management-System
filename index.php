<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
</head>
<link rel="stylesheet" type="text/css" href="css/loginAdmin.css">
<link href="css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

   <?php include 'header.php'; ?> 

 
    <div class="container" style="margin-top:40px">
<!-- -------------------------------------------------------- -->

      <!-- <div style="float: right;width: 150px;height: 30px;border: 1px solid black; text-align: center;background-color: white;">
            <label>
              <a href="loginUser.php" style="font-family:cursive;">Login User</a>
            </label>
      </div> -->
<!-- -------------------------------------------------------- -->


            <form  name="login_form" class="form-signin" action="index.php" method="post" >
             
         
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 align="center">Sign In</h3>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="pass" class="form-control" placeholder="Password" required autofocus>
					</div>
					
					<div class="form-group">
						<input type="submit" value="Login" name="signin" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		
			</div>
		</div>
	</div>
</div>      
            
            </form>
          </div>
      </div>
    </div>
</body>
</html>



<?php

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if (isset($_POST['signin'])){ 
    $uname=$_POST['username'];
    $pass=$_POST['pass'];

     session_start();
    $_SESSION['name']=$uname;

    $sql="select * from loginadmin where username='$uname' and password='$pass'";
    $run=mysqli_query($con,$sql);
    $row=mysqli_num_rows($run);
    if($row == 1){

        if ($_SESSION['name'] == true) {
              echo " <script>
  
          alert('You are sucessfully login..');
          location.href='adminHome.php';
        
          </script> ";

          } 
      }
     else{

        ?>
       <script>
        alert('Username or Password does not match ! !');
        window.open('index.php','_self');
      </script>  
      <?php   
    }
}
?>