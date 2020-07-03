<?php
  include 'Classes/PHPExcel/IOFactory.php';

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if (isset($_POST['submit'])){ 
	if (isset($_FILES['excelFile'])){
// ----------------------excell data upload------------------------------ 
	$inputfilename=$_FILES{'excelFile'}{'tmp_name'};
	$exceldata= array( );

	if(!$con){
		  die("connect Error : ".mysqli_connect_error());
	}
	try{
		$inputfiletype=PHPExcel_IOFactory::identify($inputfilename);
		$objReader=PHPExcel_IOFactory::createReader($inputfiletype);
		$objPHPExcel=$objReader->load($inputfilename);
	}catch(Exception $e){
		die('Error loading file " '.pathinfo($inputfilename,PATHINFO_BASENAME).' ": '.$e->getMessage());
	}

	$sheet=$objPHPExcel->getSheet(0);
	$highestRow=$sheet->getHighestRow();
	$highestColumn=$sheet->getHighestColumn();

	for ($row=2; $row <=$highestRow ; $row++) { 
		$rowData=$sheet->rangeToArray('A' . $row .':'.$highestColumn.$row,NULL,TRUE,FALSE);
		$sql="insert into stuData(name,roll,eroll,gender,dep,sem) values(' ".$rowData[0][1]." ',' ".$rowData[0][2]." ',' ".$rowData[0][3]." ',' ".$rowData[0][4]." ',' ".$rowData[0][5]." ',' ".$rowData[0][6]." ')";
		
		if (mysqli_query($con ,$sql)) {
			$exceldata=$rowData;
						 ?>
						<script>
        				alert('-----sucessful------');
        				window.open('addData.php','_self');
      					</script>
      					<?php
		}else{
			 			?>
						<script>
        				alert('-----Error -duplicate data------');
        				window.open('addData.php','_self');
      					</script>
      					<?php
			// echo "Error : ".$sql."<br>".mysqli_connect_error;
			// 			echo "Error : ".$sql."<br>".mysqli_error($con);
		}
	}
	mysqli_close($con);
// ----------------------excel file upload------------------------------------
	$file=$_FILES['excelFile'];
	$fileName=$_FILES['excelFile']['name'];
	$fileTmpName=$_FILES['excelFile']['tmp_name'];
	$fileSize=$_FILES['excelFile']['size'];
	$fileError=$_FILES['excelFile']['error'];
	$fileType=$_FILES['excelFile']['type'];

	$fileExt=explode('.', $fileName);
	$fileActualExt=strtolower(end($fileExt));

	$allowed=array('xls','xlsx');

	if (in_array(
		$fileActualExt, $allowed))
	{
		if ($fileError === 0) {
			
			if ($fileSize<1000000) {
				//$fileNameNew=$fileName.".".$fileActualExt;
				$fileDestination='uploads/'.$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);
				//header("location: index.php?uploadsucess");	
				# code...
			}else{
						?>
						<script>
        				alert('-----your file is too big  !!------');
        				window.open('addData.php','_self');
      					</script>
      					<?php				 
			}

		}else{
						?>
						<script>
        				alert('-----there was an error uploading your file------');
        				window.open('addData.php','_self');
      					</script>
      					<?php
		}

		
	}else{
						?>
						<script>
        				alert('--You cannot uplod this file--');
        				alert('-allowed('jpg','jpeg','png','pdf','xls','xlsx')-');
        				window.open('addData.php','_self');
      					</script>
      					<?php		

	}
//---------------------------------------------------------------------------- 
  }
}

?>
