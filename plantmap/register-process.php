<?php

require ('helper.php');
// error variable.
$error = array();

$username = validate_input_text($_POST['username']);
if (empty($username)){
    $error[] = "You forgot to enter your user Name";
}


$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)){
    $error[] = "You forgot to enter your Confirm Password";
}
$user_data = 'username='. $username;
$files = $_FILES['profileUpload'];
$picture = upload_profile('./assets/profile/', $files);

if(empty($error)){
    require ('mysqli_connect.php');
      $sql = "SELECT * FROM user WHERE username='$username' ";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: register.php?error=The username is taken try another&$user_data");
            exit();
        }else {
           $sql2 = "INSERT INTO user(username, password,picture) VALUES('$username', '$password','$picture')";
           $result2 = mysqli_query($con, $sql2);
           if ($result2) {
             header("Location: register.php?success=Your account has been created successfully");
             exit();
           }else {
                header("Location: register.php?error=unknown error occurred&$user_data");
                exit();
           }
        }
    
  

}else{
    echo 'not validate';
}


















