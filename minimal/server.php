<?php
session_start();

// initializing variables
$username = "";
$username2 = "";
$email    = "";
$dep="";
$name="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'th');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);//echo $username;
  $username2 = mysqli_real_escape_string($db, $_POST['username2']);//echo $username;
  $dep= mysqli_real_escape_string($db, $_POST['dep']);//echo $dep;
  $name= mysqli_real_escape_string($db, $_POST['name']);//echo $name;
  $email = mysqli_real_escape_string($db, $_POST['email']);//echo $email;
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
   if (empty($username2)) { array_push($errors, "Role is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($dep)) { array_push($errors, "Department is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  if($username2=="Student")
  { // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM student WHERE std_id='$username' OR std_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['std_id'] === $username) {
      array_push($errors, "Username already exists");
      echo "Username already exists";
    }

    if ($user['std_email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO student (std_name,std_id,std_dep,std_email, std_pass)
  			  VALUES('$name','$username','$dep','$email', '$password_1')";


	if ($db->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}

    $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
	$_SESSION['name'] = $name;
  	header('location: index.php');
  }
  }

  else if($username2=="Teacher")
  { // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM teacher WHERE teacher_id='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['teacher_id'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO teacher (teacher_name,teacher_id,dep,email,pass)
  			  VALUES('$name','$username','$dep','$email', '$password_1')";



	if ($db->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
}


  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
	$_SESSION['name'] = $name;
  	header('location: index.php');
  }
  }

}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $radio=mysqli_real_escape_string($db, $_POST['type']);

    if($radio=="Student"){
        if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM student WHERE std_id='$username' AND std_pass='$password'";
  	$results = mysqli_query($db, $query);
	 $user = mysqli_fetch_assoc($results);
	 $f=$user['std_name'];
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
	  $_SESSION['name'] = $f;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }

    }

    if($radio=="Teacher"){
        if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM teacher WHERE teacher_id='$username' AND pass='$password'";
  	$results = mysqli_query($db, $query);
	 $user = mysqli_fetch_assoc($results);
	 $f=$user['teacher_name'];
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
	  $_SESSION['name'] = $f;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }

    }

    if($radio=="Admin"){
        if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM admin WHERE ad_id='$username' AND ad_pass='$password'";
  	$results = mysqli_query($db, $query);
	 $user = mysqli_fetch_assoc($results);
	 $f=$user['ad_id'];
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
	  $_SESSION['name'] = $f;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index_a.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }

    }

}

?>
