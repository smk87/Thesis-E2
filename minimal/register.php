<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body background="pay.jpg">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" action="register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">ID</label>
                <input class="form-control" id="exampleInputName" type="text" name="username" required aria-describedby="nameHelp" placeholder="Enter ID" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Type</label>
                <input class="form-control" id="exampleInputLastName" type="text" name="username2" required aria-describedby="nameHelp" placeholder="Enter Account Type">
              </div>
                <div class="col-md-6">
                <label for="exampleInputLastName">Department</label>
                <input class="form-control" id="exampleInputLastName" type="text" name="dep" required aria-describedby="nameHelp" placeholder="Enter Department">
              </div>
                <div class="col-md-6">
                <label for="exampleInputLastName">Name</label>
                <input class="form-control" id="exampleInputLastName" type="text" name="name" required aria-describedby="nameHelp" placeholder="Enter Name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="email" required aria-describedby="emailHelp" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" name="password_1" required placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" name="password_2" required placeholder="Confirm password">
              </div>
            </div>
          </div>
            <div class="input-group">
  	             <button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>
  	         </div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>

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
