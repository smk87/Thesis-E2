<?php
 
 //The name of the directory that we need to create.
$p=$_POST['tid'];
$sid=$_POST['sid'];

 $directoryName = 'appupload/'.$p;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755, true);

    // Copying
$srcfile = 'appupload/h/index.php';
$destfile = $directoryName.'/index.php';
 
if (!copy($srcfile, $destfile)) {
    echo "File cannot be copied! \n";
}
else {
    //echo "File has been copied!";
}
}

 
 define ("filesplace",$directoryName);

 if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {

 if ($_FILES['classnotes']['type'] != "application/pdf") {
 echo "<p>Application must be uploaded in PDF format.</p>";
 } else {
 $name = $_POST['name'];
 $name=$name.'_'.$sid;
 $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], filesplace."/$name.pdf");
 if ($result == 1) echo "<p>Upload Done .</p>";
 else echo "<p>Sorry, Error happened while uploading . </p>";
} #endIF
 } #endIF
?>