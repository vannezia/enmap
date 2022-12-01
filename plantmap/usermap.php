<?php
   include('session.php');
   require_once 'config.php';
  
   $result = $db->query("SELECT * FROM plants"); 
 
// Fetch the info-window data from the database 
$result2 = $db->query("SELECT * FROM plants"); 
?>


<!DOCTYPE html>
  <head>
    <meta http-equiv="content-type" content="text/html"  charset="utf-8">
    <meta name="viewport" content="IE=edge", user-scalable="no" >
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
    #mapCanvas {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       border: 1px solid blue;
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
                <li ><a href="userhome.php">HOME</a></li>
                <li class="active"><a href="usermap.php">MAP<span class="sr-only">(current)</span></a></li>
                 <li  ><a href="userinventory.php">PLANTS</a></li>
                  
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
     <p class="header-text" style="text-align: center"><b>Map</b></p>
      </section>

      <!-- Main content -->
      <section class="content">
        
        
        <div class="box box-default" onload="initMap()">
      
         <div id="mapCanvas"></div>
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
<script>
// Initialize and add the map
//function initMap() {
  // The location of Uluru
 // var uluru = {lat: 8.2280, lng:124.2452};
  // The map, centered at Uluru
 // var map = new google.maps.Map(
     // document.getElementById('map'), {zoom: 10, center: uluru});
  // The marker, positioned at Uluru
 // var marker = new google.maps.Marker({position: uluru, map: map});
//}
 
   function initMap() {

        var iligan = new google.maps.LatLng(8.2280,124.2452); //{lat: 8.2280, lng:124.2452};
  // The map, centered at Uluru
 // var map = new google.maps.Map(
     // document.getElementById('map'), {zoom: 10, center: uluru});
  // The marker, positioned at Uluru
 // var marker = new google.maps.Marker({position: uluru, map: map});
  
    var bounds = new google.maps.LatLngBounds();
    //var mapOptions = {
   //     mapTypeId: 'roadmap'
  //  };
                    
    // Display a map on the web page
   var map = new google.maps.Map(document.getElementById("mapCanvas"),  {zoom: 20, center: iligan});
   var marker = new google.maps.Marker({position: iligan, map: map});
    map.setTilt(100);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){ 
               echo '["'.$row['family'].'", '.$row['latitude'].', "'.$row['longitude'].'"],'; 
            } 
        } 
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        <?php if($result2->num_rows > 0){ 
            while($row = $result2->fetch_assoc()){ ?>
                ['<div id="content">'+
                    '<div id="bodyContent">' +
                      '<div style="float:right; width:20%;"><img src="data:image/jpg; charset=utf8; base64,<?php echo base64_encode($row['image']); ?>" style="width=20px height=20px float:right"></div>'+
                        '<h1><?php echo $row['family']; ?></h1>' +
                        '<p><?php echo 'Common Name: '.$row['common_name'].'<br>Scientific Name: '.$row['scientific_name'].'<br>Status: '.$row['status'].'<br>Category: '.$row['category'].''; ?> </p>' + '</div>'+
    '</div>'],
        <?php } 
        } 
        ?>
    ];
     mark = 'marker/vul.png';
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
      icon: mark,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);

    </script>


   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTWHH7bW7fOnA_MDr7f_vN2W5GAJ6ARIk&callback=initMap">
    </script>

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


</body></html>