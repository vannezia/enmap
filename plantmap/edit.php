<?php
    include 'include/dbh.inc.php';
  include ('session.php');
if(isset($_POST['update']))
{ 
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $common_name = mysqli_real_escape_string($conn, $_POST['common_name']);
  $scientific_name = mysqli_real_escape_string($conn, $_POST['scientific_name']);
  $family = mysqli_real_escape_string($conn, $_POST['family']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $measurement = mysqli_real_escape_string($conn, $_POST['measurement']);
   $new_image = mysqli_real_escape_string($conn, $_POST['new_image']['common_name']);
    $old_image = mysqli_real_escape_string($conn, $_POST['old_image']);
 if($new_image !='')
 {
    $update_filename = $_FILES['image']['common_name'];
 }
 else
 {
    $update_filename = $old_image;
 }
 if(file_exists("plants/" . $_FILES['image']['name']))
 {
    $filename = $_FILES['image']['name'];
    $_SESSION['status']= "Image already exist" .$filename;

 }
 else{
     $query =mysqli_query($conn, "UPDATE plants SET image='$update_filename',status='$status',common_name='$common_name',scientific_name='$scientific_name',family='$family',category='$category',measurement='$measurement' WHERE id=$id");
     $query_run = mysqli_query($conn,$query);
}
   if($query_run)
    {
      $_SESSION['stats'] = "image not updated" ;
    }
   }

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
  <!-- Bootstrap 4.0.0 -->
  <!-- <link rel="stylesheet" href="../plugins/bootstrap-4.0.0-dist/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
    #del_plant{
      margin-left: 5px;
    }
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
         <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       <img src="../img/denr2.png" class="img-rounded " alt="User Image" style="float:left;width:50px;height:50px;">
  
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DENR</b></span>
    </a>
           
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
                <li ><a href="home.php">HOME</a></li>
                <li><a href="map.php">MAP</a></li>
                 <li  class="active"><a href="#">PLANTS<span class="sr-only">(current)</span></a></li>
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
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
 <div class="content-wrapper" style="background-color: rgb(207, 236, 240);">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <p class="header-text"><b>EDIT PLANT</b></p>
        <div class="btn-group">
          <a href="inventory.php" class="btn btn-primary">Plants</a>
          <a href="addplant.php" class="btn btn-primary">Add</a>
          <a href="editplant.php" class="btn btn-primary active">Details</a>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
            <a href="inventory.php" class="btn btn-primary">&lt; Back</a>
           
          </div>
          <div class="box-body">
            <form  method="post" action="editplant.php" enctype="multipart/form-data">
              <div class="row">
                <!-- Upload Image -->
                <div class="col-sm-5 text-center">
                  <img  class="img-circle" width="300" height="300"  src="<?php echo "/plants".$row['image']; ?>"><br><br>
                   
                  <input id="image" class="form-control-file border" type="file" accept="image/*" onchange="openFile(event)" name="image" value="<?php echo $dst_db; ?>">
  
                      
                </div>
                <!-- Plant Details -->
                 <div class="col-sm-7">
                <div class="input-group">
                        <span class="input-group-addon">Common Name</span>
                 
                          <input type="text" class="form-control" id="common_name" name="common_name" value="<?php echo $common_name; ?>"placeholder="Enter Common name">
                   
                        </div>
                       <!-- <div class="input-group">

                          <span class="input-group-addon">Common Name</span>
                 
                          <input type="text" class="form-control" id="common_name" name="common_name" placeholder="Enter Common name">

                    </div>-->
                        <div class="input-group">
                          <span class="input-group-addon">Scientific Name</span>
                     <input type="text" class="form-control" id="scientific_name" name="scientific_name" value="<?php echo $scientific_name; ?>"placeholder="Enter Scientific name">
                    </div>

                    <div class="input-group">
                          <span class="input-group-addon">Family</span>
                     <input type="text" class="form-control" id="family" name="family" value="<?php echo $family; ?>"placeholder="Enter family">
                    </div>

                        <div class="input-group">
                          <span class="input-group-addon">Status</span>
                    <select class="form-control" name="status">
                          
                          <option><?php echo $status; ?></option>
                          <option value="live">Live</option>
                      <option value="withered">Withered</option>
                      <?php echo $status; ?>"


                   
                    
                    </select>
                  </div>
                      
                         <div class="input-group">
                          <span class="input-group-addon">Category</span>
                           
                           <select class="form-control" name="category">
                          
                          <option><?php echo $category; ?></option>
                         <option value="undefined">Undefined...</option>
                      <option value="Critically Endangered">Critically Endangered</option>
                      <option value="Endangered">Endangered</option>
                      <option value="Vulnerable">Vulnerable</option>
                      <option value="LR/CD">Lower Risk/Conservation Dependent</option>
                      <option value="LR/NT">Lower Risk/Near Threatened</option>
                      <?php echo $category; ?>"
                  </select>
                          </div>

                         
                
                        
                          <div class="modal-footer form-group" style="margin-top: -2.5rem;">
                            <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                            

                          </div>
                           </div>
           
              <button type="submit" class="btn btn-warning text-center " name="update">Update</button>
               
              </div>
              
            
            </form>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script>
    var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL; 
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap 4.0.0 -->
<!-- <script src="../plugins/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script> -->
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