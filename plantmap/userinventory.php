<?php
    include ('session.php');
    include_once 'include/dbh.inc.php';
 



     $query="SELECT * FROM plants INNER join barangay on plants.barangay_id=barangay.barangay_id INNER Join city on barangay.city_id=city.city_id";
     $result = mysqli_query($conn, $query);
    if(!$conn) {
          echo '<script> alert("Error: Unable to open database\n");</script>';
        } else {
          echo '<script> alert("Opened database successfully\n");</script>';  
      }; 
      

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DENR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
    th, td {
  text-align: left;
  padding: 8px;
}
  </style>
</head>


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
                <li ><a href="userhome.php">HOME</a></li>
                <li><a href="usermap.php">MAP</a></li>
                 <li  class="active"><a href="userinventory.php">PLANTS<span class="sr-only">(current)</span></a></li>
                 
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
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
 

   <div class="content-wrapper" style="background-color: rgb(207, 236, 240);">

        <div class="container">
                <section class="content-header">
        <p class="header-text"><b>Plants</b></p>
        <div class="btn-group">
          <a href="inventory.php" class="btn btn-primary active">Plants</a>
          <a href="addplant.php" class="btn btn-primary">Add</a>
        </div>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
               

          <div class="box">
          
            <div class="box-body">
               <a href="#backup" data-toggle="modal">
                <div class="pull-right">
                        <button type="button" class="btn btn-success"><span class=" glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Backup</button>
                    </a>
                  </div>
                
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr bgcolor=" #00ace6">
                   <th>Image</th>
                          <th>Common Name</th>
                          <th>Scientific Name</th>
                          <th>Family</th>
                          <th>Status</th>
                          <th>Category</th>
                          <th>Location</th>
                            

                </tr>
                </thead>
                <?php
                  $result = mysqli_query($conn, "SELECT * FROM plants INNER join barangay on plants.barangay_id=barangay.barangay_id INNER Join city on barangay.city_id=city.city_id INNER Join province on city.province_id=province.province_id order by common_name asc");
                    while($res = mysqli_fetch_array($result)){

?>
 
                    
                      <tr>
                       <td><img src="<?php echo $res['image']; ?>" width="100" height="100"></td>
                       <td><?php echo $res['common_name']; ?></td>
                      <td><?php echo $res['scientific_name']; ?></td>
                      <td><?php echo $res['family']; ?></td>
                     <td><?php echo $res['status']; ?></td>
                      <td><?php echo $res['category']; ?></td>
                       <td><?php echo $res['purok'],",", $res['barangay_name'],"<br>", ",",$res['city_name'],",", $res['province_name']; ?></td>
                      
                   </tr>
                   <?php
}
?>


                    
              
               
               
              </table>


       <!--CSV Modal -->
                      <div id="backup" tabindex="-1"s class="modal fade" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header text-center">
                              <h4 class="modal-title"> Clear Data</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" class="form-horizontal" role="form" action="include/export.php">
                                <!--input type="hidden" name="delete_stock_id" value="<?php echo $stock_id; ?>"-->
                                Export data from History into Excel or <b><i>.CSV file</i></b>. <br><br>
                                <div class="modal-footer">
                                  <button type="submit" name="export" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Yes</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal"><!--span class="glyphicon glyphicon-remove-circle"></span--> No</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

 
 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
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
</body>
</html>