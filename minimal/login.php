<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MIST Billing System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


</head>

<body background="pay.jpg">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="login.php">
          <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="username" required aria-describedby="emailHelp" placeholder="Enter Your ID">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="password" required placeholder="Enter Your Password">
          </div>
            <label class="container">
                <input type="radio" name="type" value="Student" checked> Student<br>
                <input type="radio" name="type" value="Teacher"> Teacher<br>
        <input type="radio" name="type" value="Admin"> Admin
        <span class="checkmark"></span>
        </label>

            <div class="input-group">
  		<button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button>
  	</div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>

        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
