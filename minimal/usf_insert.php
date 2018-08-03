<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "th");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Escape user inputs for security
$id = $mysqli->real_escape_string($_REQUEST['id']);
$billtype = $mysqli->real_escape_string($_REQUEST['billtype']);
$billamt = $mysqli->real_escape_string($_REQUEST['billamt']);
$duedate = $mysqli->real_escape_string($_REQUEST['duedate']);
$billinfo = $_POST['billinfo'];

// attempt insert query execution
$sql = "INSERT INTO bill (bill_stdid, bill_type, bill_amt, bill_duedate,bill_info) VALUES ('$id','$billtype', '$billamt', '$duedate','$billinfo')";
if ($mysqli->query($sql) === true) {
    echo "Records inserted successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

header("refresh:5;url=usf.php");


// Close connection
$mysqli->close();
?>
<h1>This page will be redirected in 5 seconds...</h1>