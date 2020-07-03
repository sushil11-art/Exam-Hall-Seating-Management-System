
<!DOCTYPE html>
<html>
<head>
<title>Admin Home</title>

<link rel="stylesheet" type="text/css" href="css/adminhome.css">
 <script type="text/javascript" src="js/adminhome.js"></script>

</head>

<body style="background-color:whitesmoke;" >

  <?php include "adminSlide.php"; ?>
<div style="margin-left: 220px; margin-top: 60px;">
 <!--------------------------------------------------  -->
 <ul class="start">
		<li>
			<div class="container">
				<label  class="title"> Dashboard</label>
        <button class="button" type="submit" name="delete" onclick="confirmNextExam()">Start Next Exam</button>
			</div>
		</li>
	</ul>
<!-- -------------------------------------------------- -->
	<div class="container">
		<hr class="hr">
	</div>

  <div style="margin-left: 200px;">

  <div class="row">
    <!-- ----------------------department column--- -->
  	<div class="column" >
      <div >
       
      <label><a href="department.php" class="a">Department</a></label>
       <!--  <div id="mydepartment" class="department-content">
         <a  href="#">BE-IT</a>
         <a  href="#">BE-Computer</a>
          <a href="#">BE-Software</a>
        -->
    </div> 
    </div>
  	</div>
    
    <!-- ------------------------------------------ -->
  	<!-- <div class="column">
  		<a href="#" class="a">Student Data</a>
  	</div> -->
    <!-- ------------------------------------- -->
  	<div class="colum";>
  		<a href="operationRoom.php" class="a" >Room Operation</a>
  	</div>

    <div class="colu">
      <a href="admin-signup.php" class="a">Add Admin</a>
    </div>
  	
  </div>
</div>
  <!-- --------------------------------------------------- -->
   
</div>
</body>
</html>
