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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>


    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-block">
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
                        Student ID: <input type="text" name="name" value="" required /><br /><br />
                        Teacher ID: <input type="text" name="t" value="" required /><br /><br />
                        Application(PDF): <input type="file" name="classnotes" value="" /><br />
                        <input type="hidden" name="p" value="<?php echo $c ?>" /><br />
                        <p><input type="submit" name="submit" class="btn btn-primary" value="Submit Application" /></p>
                    </form>

                    <?php
   error_reporting(0);
   $p=$_POST['p'];
   //echo $p;
   $t=$_POST['t'];
   //echo $t;
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
         echo "<p>Application must be uploaded in PDF format.</p>";
      } else {
         $name = $p.'_'.$_POST['name'];
         $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], FILEREPOSITORY."/$name.pdf");
         if ($result == 1) echo "<p>File successfully uploaded.</p>";
         else echo "<p>There was a problem uploading the file.</p>";
      } #endIF
   } #endIF
?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>