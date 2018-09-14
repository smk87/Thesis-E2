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

                    <form action="upload.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="name" value="<?php echo $c ?>" /><br />
                        Your ID:<br /> <input type="text" name="sid" required value="" /><br /><br>
                        Teacher ID:<br /> <input type="text" name="tid" required value="" /><br /><br>
                        Application(PDF): <input type="file" name="classnotes" required value="" /><br /><br>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>