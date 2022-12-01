<?php

$error = array();

$username = validate_input_text($_POST['username']);
if (empty($username)){
    $error[] = "You forgot to enter your username";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){
    // sql query
    $query = "SELECT user_id, username, password, picture FROM user WHERE username=?";
    $q = mysqli_stmt_init($con);
    mysqli_stmt_prepare($q, $query);

    // bind parameter
    mysqli_stmt_bind_param($q, 's', $username);
    //execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)){
        // verify password
        if(password_verify($password, $row['password'])){
            header("location: index.php");
            exit();
        }
    }else{
        print "You are not a member please register!";
    }

}else{
    echo "Please Fill out email and password to login!";
}
