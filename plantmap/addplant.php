<?php
   
     include ('session.php');
  
    include_once 'include/dbh.inc.php';

      $query="SELECT * FROM plants INNER join barangay on plants.barangay_id=barangay.barangay_id INNER Join user on plants.user_id=user.user_id";


    if(isset($_POST['add'])){
      $cname = $_POST['common_name'];
      $sname = $_POST['scientific_name'];
      $family = $_POST['family'];
      $status = $_POST['status'];
      $category = $_POST['category'];
      $ptype = $_POST['planting_type'];
      $sdate = $_POST['sampling_date'];
      $measurement = $_POST['measurement'];
      $lat = $_POST['latitude'];
      $long = $_POST['longitude'];
      $prk = $_POST['purok'];
      $zone = $_POST['zone'];
      $street = $_POST['street'];
      $brgy = $_POST['barangay_id'];
       $user = $_POST['user_id'];
    
     $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
  
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
    $dst = "./plants/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "plants/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);

    if (!$conn) {
      die("Connection failed:" . mysqli_connect_error());
    }

    $sql = "INSERT INTO plants (image,common_name,scientific_name,family,status,category,planting_type,sampling_date,measurement,latitude,longitude,purok,zone,street,barangay_id,user_id) VALUES('$dst_db','$cname', '$sname', '$family', '$status', '$category', '$ptype', '$sdate', '$measurement', $lat, $long, '$prk', '$zone', '$street', '$brgy','$user')";

    if (mysqli_query($conn, $sql)) {
      echo "New plant added";
    }else{
      echo "Error:" .$sql."<br>".mysqli_error($conn);
    }
    mysqli_close($conn);
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
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <p class="header-text"><b>ADD PLANT</b></p>
        <div class="btn-group">
          <a href="inventory.php" class="btn btn-primary">Plants</a>
          <a href="addplant.php" class="btn btn-primary active">Add</a>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-header with-border">
            
          </div>
          <div class="box-body">
            
            <form method="post" enctype="multipart/form-data">
              <a href="inventory.php" class="btn btn-primary">&lt; Back</a>
              <div class="row">
                <!-- Upload Image -->
                <div class="col-sm-5 text-center">
                 <!-- <img id='output' class="img-circle" width="300" height="300" alt="Plant Image" src="../dist/plantmapimgs/defplantimg.png"><br><br>
                  <label id="upload_btn" for="plant_img" class="bg-primary">Upload Image</label>
                  <input id="plant_img" class="form-control-file border" type="file" accept="image/*" onchange="openFile(event)">-->
                  <!--<form method="POST" action="inventory.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      
    <input type="file" name="image" /> <input type="submit" value="Upload" /> </div>

</form>-->         
 <img id='output' class="img-circle" width="300" height="300" alt="Plant Image" src="../dist/plantmapimgs/defplantimg.png"><br><br>
                  <label id="upload_btn" for="plant_img" class="bg-primary">Upload Image</label>
                  <input id="plant_img" class="form-control-file border" type="file" accept="image/*" onchange="openFile(event)" name="image">
  
   
 
                </div>
                <!-- Plant Details -->
                <div class="col-sm-7">
                  <div class="input-group">
                    <span class="input-group-addon">Common Name:</span>
                    <input class="form-control" type="text" name="common_name" placeholder="">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Scientific Name:</span>
                    <input class="form-control" type="text" name="scientific_name" placeholder="">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Family:</span>
                    <input class="form-control" type="text" name="family" placeholder="">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Select Status:</span>
                    <select class="form-control" name="status">
                      <option value="undefined">Undefined...</option>
                      <option value="live">Live</option>
                      <option value="withered">Withered</option>
                    </select>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Select Category:</span>
                    <select class="form-control" name="category">
                      <option value="undefined">Undefined...</option>
                      <option value="Critically Endangered">Critically Endangered</option>
                      <option value="Endangered">Endangered</option>
                      <option value="Vulnerable">Vulnerable</option>
                      <option value="LR/CD">Lower Risk/Conservation Dependent</option>
                      <option value="LR/NT">Lower Risk/Near Threatened</option>
                    </select>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Select Planting Type:</span>
                    <select class="form-control" name="planting_type">
                      <option value="undefined">Undefined...</option>
                      <option value="natural-grown">Natural Grown</option>
                      <option value="planted">Planted</option>
                    </select>
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">Sampling Date:</span>
                    <input class="form-control" type="date" name="sampling_date">
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">Measurement/s:</span>
                    <textarea class="form-control" name="measurement" placeholder=""></textarea>
                  </div><br>
                  <h3>Plant's Location:</h3>
                  <div class="input-group">
                    <span class="input-group-addon">Latitude:</span>
                    <input class="form-control" type="" name="latitude" placeholder="">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Longitude:</span>
                    <input class="form-control" type="" name="longitude" placeholder="">
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">Purok:</span>
                    <input class="form-control" type="text" name="purok" placeholder="">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Zone:</span>
                    <input class="form-control" type="text" name="zone" placeholder="">
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">Street:</span>
                    <input class="form-control" type="text" name="street" placeholder="">
                  </div>
                  <div class="input-group">
                      <span class="input-group-addon">Barangay:</span>
                    <input class="form-control" type="text" name="barangay_id" placeholder="">
                  </div>
                   <div class="input-group">
                    <span class="input-group-addon">Added by:</span>
                    <input class="form-control" type="text" name="user_id" placeholder="id">
                 
                </div>
                 <button class="btn btn-primary pull-right" type="submit" name="add">Add</button>
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