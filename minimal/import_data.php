<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

$conn = new mysqli("localhost", "root", "", "th");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

require_once('spreadsheet-reader/php-excel-reader/excel_reader2.php');
require_once('spreadsheet-reader/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
  $message1 = "";  
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'exlupload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $stdid = "";
                if(isset($Row[0])) {
                    $stdid = mysqli_real_escape_string($conn,$Row[0]);
                    //echo $stdid;
                }
                
                $type = "";
                if(isset($Row[1])) {
                    $type = mysqli_real_escape_string($conn,$Row[1]);
                    //echo $type;
                }

                $info = "";
                if(isset($Row[2])) {
                    $info = mysqli_real_escape_string($conn,$Row[2]);
                   // echo $info;
                }

                $ddate = "";
                if(isset($Row[3])) {
                    $ddate = mysqli_real_escape_string($conn,$Row[3]);
                   // echo $ddate;
                }

                $amount = "";
                if(isset($Row[4])) {
                    $amount = mysqli_real_escape_string($conn,$Row[4]);
                   // echo $amount;
                   //echo " ";
                }
                
                if (!empty($stdid) || !empty($type) || !empty($info) || !empty($ddate) || !empty($amount) ) {
                 $sql = "INSERT INTO bill (bill_stdid, bill_type, bill_amt, bill_duedate,bill_info) VALUES ('$stdid','$type', '$amount', '$ddate','$info')";
if ($conn->query($sql) === true) {
    $message1 = "Records Inserted Successfully.";
}
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
  echo $message1;
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
	font-family: Arial;
	width: 550px;
    padding: 5px 300px;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 4px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	cursor: pointer;
    padding: 5px 20px;
    border-radius: 4px;
    font-size:0.9em;
    
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
    background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}



</style>



</head>

<body>
    <h2>Import Student Bill Records</h2>

    <div class="outer-container">
        <center>
            <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                <div >
                    <label>Choose Excel
                        File</label> <input type="file" name="file" id="file"
                        accept=".xls,.xlsx">
                    <button type="submit" id="submit" name="import" class="btn-submit">Import</button>

                </div>
                </center>

            </form>

            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
                <?php if(!empty($message)) { echo $message; } ?>
            </div>

    </div>


</body>

</html>