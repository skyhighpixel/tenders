<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo(isset($_POST["username"]));
echo(isset($_POST["password"]));


if (isset($_POST["username"]) && isset($_POST["password"])) {

    require_once ("db.php");

// escape variables for security
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    $checkUser = "SELECT * FROM admin WHERE username = $username";
    $loginResult = mysqli_query($connect, $checkUser);

    if(mysqli_num_rows($loginResult) == 0){
        //Email not registered
        $_SESSION['loginError'] = 'Email not registered';
        header('Location: /register.php');
    }

    $userData = mysqli_fetch_array($loginResult, MYSQLI_ASSOC);
    $hashedPW = hash('SHA512', $password . $userData['date']);

    if($hashedPW != $userData['password']){
        //Incorrect Password
        $_SESSION['loginError'] = 'Incorrect Password';
        header('Location: /register.php');
    } else {
        $_SESSION['loginStatus'] = true;
        $_SESSION['admin'] = true;
        header('Location: /edit');
    }



    mysqli_close($connect);
    exit();
}