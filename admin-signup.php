<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sign-up</title>
		  <?php include 'header.php'; ?>	
			   <link rel="stylesheet" href="css/sign-up.css">
			   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	           <!-- <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script> -->
	          <script type="text/javascript" src="js/passvalid.js"></script> 

	          
</head>
<body>
	 <?php include "adminSlide.php"; ?>
	  <div style="margin-left: 20px; margin-top: 60px;">
	<!-- --------------------------------------------------- -->
	<br>
	<br>
	<div class="container">
			<form  class="border" id="form_check"  action="admin_form_insert.php" method="post"  >

				<div class="panel-heading" align="center">
	            	<strong> Sign up Form</strong>
    			</div>
    			<br>
				
				<div class="space">
					
					
					<div class="container h-80">
            <form  class="form-signin">
                
        
						
			<label>User Name</label>
		<input type="text" name="uname" class="form-control" placeholder="Username" required autofocus>
		<label>Password</label>
                <input type="password" name="Password" id="inputPassword" class="form-control form-group" placeholder="Password" required autofocus>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login" >Enter</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- 
				<div class="space">
					<button type="submit" class="submitbtn"  >Submit</button>
				</div> -->
			</form>
		</div>
	</div>
</body>
</html>

