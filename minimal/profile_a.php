<?php
session_start();
require_once( 'couch/cms.php' );

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <title><cms:get_custom_field 'sitename' masterpage='couch/globals.php' /></title>
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

    <body class="fix-sidebar fix-header card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index_a.php">
                            <!-- Logo icon -->
                            <b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="<cms:get_custom_field 'sitelogo' masterpage='couch/globals.php' />" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->

                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto mt-md-0 ">
                            <!-- This is  -->
                            <li class="nav-item">
                                <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                                    <i class="ti-menu"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
                                    <i class="icon-arrow-left-circle"></i>
                                </a>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-message"></i>
                                    <div class="notify">
                                        </span>
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu mailbox animated bounceInDown">
                                    <ul>
                                        <li>
                                            <div class="drop-title">Notifications</div>
                                        </li>
                                        <li>
                                            <div class="message-center">

                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="javascript:void(0);">
                                                <strong>Check all notifications</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <li class="nav-item hidden-sm-down">
                                <form class="app-search">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <a class="srh-btn">
                                        <i class="ti-search"></i>
                                    </a>
                                </form>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="../assets/images/users/usr.jpg" alt="user" class="profile-pic" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                    <ul class="dropdown-user">
                                        <li>
                                            <div class="dw-user-box">
                                                <div class="u-img">
                                                    <img src="../assets/images/users/usr.jpg" alt="user">
                                                </div>
                                                <div class="u-text">
                                                    <h4>
                                                        <?php echo $_SESSION['name']; ?>
                                                    </h4>
                                                    <p class="text-muted">
                                                        <?php echo $_SESSION['username']; ?>
                                                    </p>
                                                    <a href="profile_a.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <a href="profile_a.php">
                                                <i class="ti-user"></i> My Profile</a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li>
                                            <a href="index_a.php?logout='1'">
                                                <i class="fa fa-power-off"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- User profile -->
                    <div class="user-profile">
                        <!-- User profile image -->
                        <div class="profile-img">
                            <img src="../assets/images/users/usr.jpg" alt="user" /> </div>
                        <!-- User profile text-->
                        <div class="profile-text">
                            <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <?php echo $_SESSION['name']; ?>
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="profile_a.php" class="dropdown-item">
                                    <i class="ti-user"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a href="index_a.php?logout='1'" class="dropdown-item">
                                    <i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User profile text-->
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li>
                                <a href="index_a.php" aria-expanded="false">
                                    <i class="mdi mdi-gauge"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-bank"></i>
                                    <span class="hide-menu">Bills</span>
                                </a>
                                <ul class="sidenav-second-level collapse" id="collapseComponents">
                                    <li>
                                        <a href="usf.php">Add Student Bills</a>
                                    </li>
                                    <li>
                                        <a href="csf.php">Update Student Bills</a>
                                    </li>
                                    <li>
                                        <a href="vsf.php">View Student Bills</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-database"></i>
                                    <span class="hide-menu">Student Base</span>
                                </a>
                                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                                    <li>
                                        <a href="usi.php">Update Student Info</a>
                                    </li>
                                    <li>
                                        <a href="vsi.php">View Student Info</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-link-variant"></i>
                                    <span class="hide-menu">Links</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="http://mist.ac.bd/">MIST</a>
                                    </li>
                                    <li>
                                        <a href="https://ems.mist.ac.bd/">EMS</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
                <!-- Bottom points-->
                <div class="sidebar-footer">
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Dashboard">
                        <i class="mdi mdi-view-dashboard"></i>
                    </a>
                    <!-- item-->
                    <a href="profile_a.php" class="link" data-toggle="tooltip" title="Profile">
                        <i class="mdi mdi-account-box-outline"></i>
                    </a>
                    <!-- item-->
                    <a href="index_a.php?logout='1'" class="link" data-toggle="tooltip" title="Logout">
                        <i class="mdi mdi-power"></i>
                    </a>
                </div>
                <!-- End Bottom points-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="row page-titles">
                        <div class="col-md-6 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0)">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-block">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->

                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer">
                    <cms:get_custom_field 'aboutinfo' masterpage='couch/globals.php' />
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="js/jquery.slimscroll.js"></script>
        <!--Wave Effects -->
        <script src="js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="js/sidebarmenu.js"></script>
        <!--stickey kit -->
        <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <!--Custom JavaScript -->
        <script src="js/custom.min.js"></script>
        <!-- ============================================================== -->
        <!-- Style switcher -->
        <!-- ============================================================== -->
        <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    </body>

    </html>

     <?php COUCH::invoke(); ?>