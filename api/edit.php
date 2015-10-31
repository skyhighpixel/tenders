<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION["loginStatus"]) && isset($_SESSION["admin"])) {
    if (isset($_POST["id"])) {

        require_once ("db.php");

        $id = $_POST["id"];
        $agency = mysqli_real_escape_string($connect, $_POST["agency"]);
        $title = mysqli_real_escape_string($connect, $_POST["title"]);
        $description = mysqli_real_escape_string($connect, $_POST["description"]);
        $close_date = mysqli_real_escape_string($connect, $_POST["close_date"]);
        $publish_date = mysqli_real_escape_string($connect, $_POST["publish_date"]);
        $contact_phone = mysqli_real_escape_string($connect, $_POST["contact_phone"]);
        $contact_email = mysqli_real_escape_string($connect, $_POST["contact_email"]);
        $category = mysqli_real_escape_string($connect, $_POST["category"]);
        $url = mysqli_real_escape_string($connect, $_POST["url"]);
        $base_site = mysqli_real_escape_string($connect, $_POST["base_site"]);

        $success = '';
        $errors = '';

        $editTender = "UPDATE currenttenders 
            SET 
                agency = '$agency', 
                title = '$title', 
                description = '$description', 
                close_date = '$close_date', 
                publish_date = '$publish_date', 
                contact_phone = '$contact_phone', 
                contact_email = '$contact_email',
                category = '$category',
                url = '$url',
                base_site = '$base_site'
            WHERE id = '$id'";

       if (!mysqli_query($connect, $editTender)) {
            $errors = 'Error: ' . mysqli_error($connect);
       } else {
            $success = 'Tender Saved!';
       }

        mysqli_close($connect);

        $response = array();
        $response['success'] = $success;
        $response['errors']  = $errors;
        echo json_encode($response);
        exit();
    } else {
        $response = array();
        $response['errors'] = 'No ID';
        echo json_encode($response);
        exit();
    }
} else {
    print 'Please log in';
    $_SESSION['error'] = 'Please log in';
    header('Location: /register.php');
}
