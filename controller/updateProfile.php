<?php

// MySQLi
$servername = "localhost";
$username   = "app_tipper_user";
$password   = "Ma3h!h57";
$dbname     = "app_tipper";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Var
$caso       = $_POST['caso'];
$dni        = $_POST['dni'];
$firstName  = $_POST['firstName'];
$lastName   = $_POST['lastName'];
$email      = $_POST['email'];
$phone      = $_POST['phone'];
$address    = $_POST['address'];
$superPower = $_POST['superPower'];

// updateProfile
if ( $caso == 'updateProfile' ) {
    $sql = "UPDATE userProfile SET dni = '$dni', firstname = '$firstName', lastname = '$lastName', email = '$email', addres = '$address', superPower = '$superPower', status = 'profile_created' WHERE phone = '$phone'";

    if ($conn->query($sql) === TRUE) {
        echo 'update_success';
    } else {
        echo 'error_update_db';
    }

    $conn->close();
}