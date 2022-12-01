<?php
 
include('session.php');
  include_once 'include/dbh.inc.php';
  session_start();
  if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    
?>

<html style="height: auto; min-height: 100%;"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DENR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <!-- Bootstrap 3.3.7 -->
  <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Ionicons -->
  <link href="../bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet">
  <!-- Theme style -->
  <link href="../dist/css/AdminLTE.min.css" rel="stylesheet">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
  <link rel="stylesheet" href="home.css">
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">

 <header class="main-header">

       
             
              <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       <img src="../img/denr2.png" class="img-rounded " alt="User Image" style="float:left;width:50px;height:50px;">
  
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DENR</b></span>
    </a>
                
      
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">HOME <span class="sr-only">(current)</span></a></li>
               <li><a href="map.php">MAP</a></li>
                 <li><a href="inventory.php">PLANTS</a></li>
                  <li><a href="users.php">USERS</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                 <img src=<?php 
                    echo $userpic ?> class="img-circle" alt="User Image" width="20" height="20">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $login_session; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src= <?php 
                    echo $userpic ?> class="img-circle" alt="User Image">
                  <p>
                   <?php echo $login_session; ?>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="login.php" class="btn btn-default btn-flat">Log out</a>
                  </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- /.navbar-custom-menu -->

          <!-- /.container-fluid -->
        </nav>
      </header>
      <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
          <section id="register">
             <div class="row m-0">
            <div class="col-lg-4 offset-lg-2">

           <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img class="camera-icon" src="./assets/camera-solid.svg" alt="camera">
                        </div>
                        <img src=<?php 
                    echo $userpic ?> style="width: 100px; height: 100px" cclass="img-circle" alt="profile">
                        <small class="form-text text-black-50">Choose Image</small>
                        <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>
                 <div class="submit-btn text-center my-5">
                            <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">upload</button>
                        </div>
                      </div>
                    </div>
       
       </section>
        <div class="pull-left text-white">
          <p> <?php echo $login_session; ?>  </p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $login_session; ?> </a>
        </div>
      </div>
      <!-- search form -->
  
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      
        <li>
          <a href="change-password.php">
            <i class="fa fa-key icon"></i>
            <span>Change Password</span>
          </a>
        </li>
        <li>
          <a href="change-password.php">
            <i class="  fas fa-route"></i> <span>Map</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="  far fa-id-badge"></i>
            <span>Usera</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        
        </li>
      
       
        
        <li>
       
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

      <!-- Full Width Column -->
      <div class="content-wrapper" style="background-color: rgb(207, 236, 240);">


        
        <div class="container">

          <!-- Main content -->
            <div class="box box-default">
              <div class="box-header with-border">
                  <h1 class="text-uppercase mb-2 " style="text-align:center;">Inventory System</h1>
           <h2 class="text-uppercase mb-0 " style="text-align:center;">Menu</h2>

           

    

          <section class="portfolio"  id="portfolio">
        <div class="container">
          

            <div class="col-xs-6 col-sm-3 d-block mx-auto">
              <a href="inventory.php">
                <div class="portfolio-item d-block mx-auto" >
                <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                  <div class="portfolio-item-caption-content my-auto w-100  text-white">
                    <h3 class="text- text-secondary mb-0"> View Inventory</h3>
                  </div>
                </div>
                <img class="img-fluid" src="../img/portfolio/inventory.png" alt="" height="100" width="100">
              </div>
              </a>
            </div>
            <div class="col-xs-6 col-sm-3 d-block mx-auto">
              <a class="portfolio-item d-block mx-auto" href="map.php">
                <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                  <div class="portfolio-item-caption-content my-auto w-100  text-white">
                    <h3 class=" text-secondary mb-0"> View Map</h3>
                  </div>
                </div>
                <img class="img-fluid " src="../img/portfolio/Map.png" alt="" height="100" width="100">
              </a>
            </div>
              <div class="col-xs-6 col-sm-3 d-block mx-auto">
              <a href="users.php">
                <div class="portfolio-item d-block mx-auto" >
                <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                  <div class="portfolio-item-caption-content my-auto w-100  text-white">
                  <h3 class=" text-secondary mb-0"> View users</h3>
                 <!-- <i class="fas fa-search-plus fa-3x"></i>-->
                </div>
              </div>
              <img class="img-fluid" src="../img/portfolio/user.png" alt="" height="100" width="100">
            </a>
          </div>
          </div>
          
        </div>
      </section>
    </section>

    </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          <!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.2.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
