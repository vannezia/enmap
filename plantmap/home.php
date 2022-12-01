<?php
 
include('session.php');
  include_once 'include/dbh.inc.php';

    
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
  <style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="skin-blue layout-top-nav" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <img src="../img/denr2.png" class="img-circle " alt="User Image" style="float:left;text-align:center; width:30px;height:30px;">
           <span class=""><b>DENR</b></span>
        </a>
        
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
         <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">HOME<span class="sr-only">(current)</span></a></li>
                <li><a href="map.php">MAP</a></li>
                 <li  ><a href="inventory.php">PLANTS</a></li>
                  <li><a href="users.php">USERS</a></li>
              </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
       <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src= <?php 
                    echo $userpic; ?> class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"> <?php 
                    echo $login_session; ?></span>
              </a>
               <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src=<?php 
                    echo $userpic ?> class="img-circle" alt="User Image">
                  <p>
                    <?php echo $login_session; ?>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="change-password.php" class="btn btn-default btn-flat">Change Password</a>
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
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
   <div class="content-wrapper" style="background-color: rgb(207, 236, 240);">


        
        <div class="container">
      
       <div class="box box-default">
              <div class="box-header with-border">
                 <a >
                
              <img   src="../img/denr2.png" alt=""  height="300" width="300">
            </a>
                  <h1 class="text-uppercase mb-2 " style="text-align:center;">Inventory System</h1>
           <h2 class="text-uppercase mb-0 " style="text-align:center;">Menu</h2>

           

    

          <section class="portfolio"  id="portfolio">
        <div class="container">
            <div class="row">
            
            <div class="col-xs-6 col-sm-3 d-block mx-auto">
              <a href="inventory.php">
                <div class="portfolio-item d-block mx-auto" >
                <div class="portfolio-item-caption d-flex position-center h-100 w-100">
                  <div class="portfolio-item-caption-content position-center w-100 text-white">
                    <h3 class="text-center text-secondary mb-0">  View Inventory</h3>
                  </div>
                </div>
                <img class="img-fluid" src="../img/portfolio/inventory.png" alt="" height="100" width="100">
              </div>
              </a>
            </div>
            <div class="col-xs-6 col-sm-3 d-block mx-auto">
              <a href="map.php">
                <div class="portfolio-item d-block mx-auto" >
                <div class="portfolio-item-caption d-flex position-center h-100 w-100">
                  <div class="portfolio-item-caption-content position-center w-100 text-white">
                    <h3 class="text-center text-secondary mb-0">  View Map</h3>
                  </div>
                </div>
                <img class="img-fluid " src="../img/portfolio/Map.png" alt="" height="100" width="100">
              </div>
              </a>
            </div>
             <div class="col-xs-6 col-sm-3 d-block mx-auto">
              <a href="users.php">
                <div class="portfolio-item d-block mx-auto" >
                <div class="portfolio-item-caption d-flex position-center h-100 w-100">
                  <div class="portfolio-item-caption-content position-center w-100  text-white">
                    <h3 class="text-center text-secondary mb-0">  View Users</h3>
                  </div>
                </div>
                <img class="img-fluid " src="../img/portfolio/user.png" alt="" height="100" width="100">
              </a>
            </div>
          </div>
       
          
      
      </div>
    </section>

    </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          <!-- /.content -->
        </div><!-- /.container -->
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


