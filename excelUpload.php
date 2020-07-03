
<?php
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');

$dbHost = "localhost";
$dbDatabase = "dbphp";
$dbPasswrod = "";
$dbUser = "root";
$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
print_r($_FILES);
if(isset($_POST['Submit']))
{
    $mimes = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    if(in_array($_FILES["file"]["type"],$mimes))
    {
        $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);

		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
        $Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());
        echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
        $html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
        for($i=0;$i<$totalSheet;$i++)
        {
            $Reader->ChangeSheet($i);
            foreach ($Reader as $Row)
            {
                $html.="<tr>";
                $name = isset($Row[0]) ? $Row[0] : '';
                $rollno = isset($Row[1]) ? $Row[1] : '';
                $gender = isset($Row[2]) ? $Row[2] : '';
                $department= isset($Row[3]) ? $Row[3] : '';
                $html.="<td>".$name."</td>";
                $html.="<td>".$rollno."</td>";
                $html.="<td>".$gender."</td>";
                $html.="<td>".$department."</td>";
                $html.="</tr>";

				$query = "insert into dataupload(std_name,rollno,gender,department) values('".$name."','".$rollno."','".$gender."','".$department."')";
                $mysqli->query($query);
            }
        }
        $html.="</table>";
         echo "Data Inserted in dababase.";

          //     echo " <script>
          //  alert('Data Inserted in dababase.');
          // location.href='viewData.php';
          // </script> ";


        }
        else
        {
           
        ?>
                        <script >
                        alert('Sorry, File type is not allowed. Only Excel file');
                        window.open('addData.php','_self');
                        </script>
          <?php      
        }
}
?>