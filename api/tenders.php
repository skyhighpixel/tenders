<?php
require_once ("db.php");

$getTenders = "SELECT * FROM currenttenders";
$tendersResult = mysqli_query($connect, $getTenders);
$errors = '';

if (!$tendersResult) {
    $errors = 'Error: ' . mysqli_error($connect);
}

$results = mysqli_fetch_all($tendersResult, MYSQLI_ASSOC);

$response = array();
$response['success'] = $results;
$response['errors']  = $errors;
echo json_encode($response);
exit();

?>