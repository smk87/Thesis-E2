<?php
$myfile = fopen("count.txt", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("count.txt"));
$c=fread($myfile,filesize("count.txt"));
//echo $c;
$c=$c+1;
//echo $c;

$myfile = fopen("count.txt", "w") or die("Unable to open file!");
$txt = $c;
fwrite($myfile, $txt);
fclose($myfile);
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="post">
    Student ID: <input type="text" name="name" value="" /><br />
    Teacher ID: <input type="text" name="t" value="" /><br />
    Application(PDF): <input type="file" name="classnotes" value="" /><br />
    <input type="hidden" name="p" value="<?php echo $c ?>" /><br />
    <p><input type="submit" name="submit" value="Submit Application" /></p>
</form>

<?php
   //error_reporting(0);
   $p=$_POST['p'];
   echo $p;
   $t=$_POST['t'];
   echo $t;
   $directoryName = 'appupload/'.$t;
 
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

   define ("FILEREPOSITORY",$directoryName);

   if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {

      if ($_FILES['classnotes']['type'] != "application/pdf") {
         echo "<p>Class notes must be uploaded in PDF format.</p>";
      } else {
         $name = $p.'_'.$_POST['name'];
         $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], FILEREPOSITORY."/$name.pdf");
         if ($result == 1) echo "<p>File successfully uploaded.</p>";
         else echo "<p>There was a problem uploading the file.</p>";
      } #endIF
   } #endIF
?>