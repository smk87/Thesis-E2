<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th";

$type=$_POST['type'];
$info=$_POST['info'];
$amt=$_POST['amt'];
$ddate=$_POST['ddate'];
$bid=$_POST['bill_id'];
$sid=$_POST['stdid'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE bill SET bill_type='$type',bill_info='$info',bill_amt='$amt',bill_duedate='$ddate' WHERE bill_id='$bid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header( "refresh:5;url=vsf_show.php?v=$sid" );
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>MIST Billing System</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <h1>This page will redirect in 5 seconds...</h1>
    <a href="vsf_show.php?v=<?php echo $sid; ?>">Click Here To Redirect Now</a>
</body>

</html>