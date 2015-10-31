<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["loginStatus"])){
    if (isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["password"])) {

        require_once ("db.php");

// escape variables for security
        $fullname = mysqli_real_escape_string($connect, $_POST["fullname"]);
        $email = mysqli_real_escape_string($connect, $_POST["email"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $date = time();
        $hashedPW = hash('SHA512', $password . $date);


        $checkUser = "SELECT EXISTS (SELECT * FROM useraccount WHERE user_name = '$_POST[email]')";

        $checkUserResult = mysqli_query($connect, $checkUser);
        $row = mysqli_fetch_assoc($checkUserResult);
        $exist = array_values($row);

        if (!$exist[0]) {

            $register = "INSERT INTO useraccount (fullname, user_name, password, date_created, verified_status)
VALUES ('$fullname', '$email','$hashedPW', '$date', 'false')";

            if (isset($_SESSION['registerError'])) {
                unset($_SESSION['registerError']);
            }

            if (!mysqli_query($connect, $register)) {
                die('Error: ' . mysqli_error($connect));
            }

            $getUser = "SELECT * FROM useraccount WHERE user_name = '$email'";
            $getUserResult = mysqli_query($connect, $getUser);

            $userData = mysqli_fetch_array($getUserResult, MYSQLI_ASSOC);
            $userID = $userData['idUserAccount'];

            $_SESSION['user'] = $userData['idUserAccount'];
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['loginStatus'] = true;

            header('Location: /');

        } else {
            $_SESSION['registerError'] = 'This email has been registered.';
            header('Location: /register.php');
        }


        mysqli_close($connect);
        exit();
    }
} else {
    $_SESSION['error'] = 'You already logged in.';
    header('Location: /register.php');
}
