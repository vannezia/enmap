<?php
   include ('session.php');
    include_once 'include/dbh.inc.php';



    if(!$conn) {
          echo '<script> alert("Error: Unable to open database\n");</script>';
        } else {
          echo '<script> alert("Opened database successfully\n");</script>';  
      };
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
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
   <link rel="stylesheet" href="./style.css">
  <style>
    .content-header{
      display: flex;
      justify-content: space-between;
    }
    .header-text{
      font-size: 30px;
      margin-bottom: -10px;
    }
    #output{
      margin-left: auto;
      margin-top: auto;
      border: 1px solid gray;
    }
    #upload_btn{
      border-radius: 3px;
      font-weight: 400;
      cursor: pointer;
      padding: 5px;
    }
    #plant_img{
      display: none;
    }
    .input-group{
      margin-bottom: 5px;
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
                <li ><a href="home.php">HOME</a></li>
                <li><a href="map.php">MAP</a></li>
                 <li  ><a href="inventory.php">PLANTS</a></li>
                  <li class="active"><a href="users.php">USERS<span class="sr-only">(current)</span></a></li>
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
                 <img src=<?php 
                    echo $userpic ?> class="img-circle" alt="User Image" width="20" height="20">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $login_session; ?></span>
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
                    <a href="#" class="btn btn-default btn-flat">Change Password</a>
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
       <section class="content-header">
        <p class="header-text"><b>Users</b></p>
        <div class="btn-group">
          <a href="users.php" class="btn btn-primary active">List</a>
          <a href="register.php" class="btn btn-primary">Add</a>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        
        
        <div class="box box-default">
         <section class="header"><center><h2>Total number of users:</h2></center></section> 
              <?php
              $total = "SELECT username FROM user ORDER BY username";
  $totalr = mysqli_query($conn,$total);

  $row = mysqli_num_rows($totalr);

  echo '<h2>'.$row.'</h2>';?></center><br>
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr bgcolor=" #00ace6" style="text-align: center">
                  <th>Image</th>
                  <th>Username</th>
                  <th>Date Registered</th>
                  <th>option</th>
                </tr>
              </thead>
             
                <?php
                  $result = mysqli_query($conn, "SELECT * from 
                    user");
                    while($res = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                       <td><img src="<?php echo $res['picture']; ?>" width="100" height="100"></td>
                       <td><?php echo $res['username']; ?></td>
                        <td><?php echo $res['date_registered']; ?></td>
                         <td> <a href="delete.php?user_id=<?php echo $res['user_id'];?>" onClick="return checkdelete()"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' ></span></button></a> </td>
                    
                      
  
                 </tr>
                   <?php
}
?>
             
            </table>
          </div>
          <!-- /.box-body -->
     
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  

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
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
  function checkdelete(){
    return confirm('Are you sure you want to delete?');
  }
</script>


</body></html>
