<!DOCTYPE html>
<html>
<head>
	<title>Upload File </title>
	 
	<style type="text/css">
		.title{
			font-size: 20px;
			float: left;
			font-weight: bold;
			margin-left: 300px;
			margin-top: 10px;

		}
		.hr{
			margin-top: 10px;
			margin-right: 20px;
			height: 3px;
			background: darkblue;
		}
		.table{
				width: 600px;
				margin-left: 100px;
		}
	</style>
</head>
<body>
	<!-- ------------------------------------- -->
	  <?php include "adminSlide.php"; ?>
	  <div style="margin-left: 220px; margin-top: 60px;">
	<!-- ------------------------------------ -->
	  <ul class="start">
		<li>
			<div class="container">
				<a href="#" class="title"> Add Excel File Student Data</a>
			</div>
		</li>
	</ul>

	<div class="container">
		<hr class="hr">
	</div>

	<div style="border: 1px solid black;width: 800px;margin-left: 50px;" >
	<form method="POST" action="dataupload.php" enctype="multipart/form-data">
		<table  class="table">
			<tr style="height: 40px;">
				<td>
					<label>Upload Excel File : </label>
				</td>
				<td align="center">
					 <input type="file" id="excelFile" name="excelFile" required>
				</td>
			</tr>
			<tr style="height: 40px;">
				<td colspan="2" align="center">
        		      <button type="submit" name="submit" >Submit</button>
				</td>
			</tr>
		</table>  
    </form>
</div>
</div>
</body>
</html>
