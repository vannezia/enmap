 
<?php
     include("config.php");
     session_start();

     if($_SERVER["REQUEST_METHOD"] == "POST"){
          $user = mysqli_real_escape_string($db, $_POST['username']);
          $pass = mysqli_real_escape_string($db, $_POST['password']);

          $sql = "SELECT * FROM user WHERE username = '$user' and password = '$pass'";
          //$sql2 = "SELECT id FROM client WHERE username = '$user' and password = '$pass'";

          $result = mysqli_query($db, $sql);
          //$result2 = mysqli_query($db, $sql2);
          
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
         /* $active = $row['active'];*/
          $count = mysqli_num_rows($result);

          if($count == 1){
             /*  $_SESSION['login_user'] = $user;
               header("LOCATION: home.php");*/

               if ($row['usertype']=="staff") {
                $_SESSION['usertype']=$user;
          header("location:userhome.php");
     }

     elseif ($row['usertype']=="admin") {
      $_SESSION['usertype']=$user;
          header("location:home.php");
     }

          } else{
               echo "Invalid username or password!";
          }
     }
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="logstyle.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
         <h3 style="text-align:center;">Login here</h3>
      <div class="text-center" style="text-align:center">
       
                     <img src="../img/denr2.png" class="img-rounded " alt="User Image" style="text-align:center:width:100px;height:100px;">
                     
                </div>
    <div class="form-item">
          <i class="fa fa-user icon"></i>
          <input type="text" name="username" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
           <i class="fa fa-key icon"></i>
          <input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
         <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
    
  </form>


 
  
</div>

</body>