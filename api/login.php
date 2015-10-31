<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["email"]) && isset($_POST["password"])) {

    require_once ("db.php");

// escape variables for security
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    $checkUser = "SELECT * FROM useraccount WHERE user_name = '$_POST[email]'";
    $loginResult = mysqli_query($connect, $checkUser);

    if(mysqli_num_rows($loginResult) == 0){
        //Email not registered
        $_SESSION['loginError'] = 'Email not registered';
        header('Location: /register.php');
    }

    $userData = mysqli_fetch_array($loginResult, MYSQLI_ASSOC);
    $hashedPW = hash('SHA512', $password . $userData['date_created']);

    if($hashedPW != $userData['password']){
        //Incorrect Password
        $_SESSION['loginError'] = 'Incorrect Password';
        header('Location: /register.php');
    } else {
        $_SESSION['fullname'] = $userData['fullname'];
        $_SESSION['user'] = $userData['idUserAccount'];
        $_SESSION['email'] = $email;
        $_SESSION['loginStatus'] = true;
        header('Location: /');
    }



    mysqli_close($connect);
    exit();
}