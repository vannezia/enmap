<?php
session_start();?>


<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="logstyle.css">
</head>
<body>
    <?php include_once ('db_conn.php');
    if(isset($_POST['change']))
{ 
    $username = $_POST['username'];
    $op = $_POST['op'];
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];
    $query = mysqli_query($conn, "SELECT username,password from user where username='$username' and password='$op'");
    $num = mysqli_fetch_array($query);
    if($num>0){
        $con = mysqli_query($conn,"UPDATE user set password= '$np' where username= '$username' ");
        $_SESSION['msg1'] = "password change successfully";
    }else{
            $_SESSION['msg1'] = "password change does not match";
        }
    }
    ?>
  

    <p style="color: red;"><?php echo $_SESSION['msg1'];?><?php $_SESSION['msg1'] ="";?></p>
    <form name="chngpwd" action="" method="post">
        <h2>Change Password</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
 <label>username</label>
        <input type="text" 
               name="username" 
               placeholder="username">
               <br>


        <label>Old Password</label>
        <input type="password" 
               name="op" 
               placeholder="Old Password">
               <br>

        <label>New Password</label>
        <input type="password" 
               name="np" 
               placeholder="New Password">
               <br>

        <label>Confirm New Password</label>
        <input type="password" 
               name="cnp" 
               placeholder="Confirm New Password">
               <br>

        <button type="submit" name="change">CHANGE</button>
          <a href="home.php" class="ca">HOME</a>
     </form>
</body>
</html>

