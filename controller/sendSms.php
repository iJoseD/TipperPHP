<?php

// MySQLi
$servername = "localhost";
$username   = "app_tipper_user";
$password   = "Ma3h!h57";
$dbname     = "app_tipper";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Var
$caso = $_POST['caso'];
$phone = $_POST['phone'];
$code = rand(1000, 9999);
$date = date('Y-m-d H:m:s');

// codeActivation
if ( $caso == 'codeActivation' ) {
    $sql = "SELECT * FROM userProfile WHERE phone = '$phone'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql = "UPDATE userProfile SET codeActivation = '$code' WHERE phone = '$phone'";
        if ($conn->query($sql) === TRUE) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.instasent.com/sms/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"from\":\"Tipper\",\"to\":\"$phone\",\"text\":\"ThankYou Tipper: $code is your confirmation code. Don't reply to this message with your code.\"}",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer 2a3aea0bcee508cb2156a5a5a8bf926488bf9c0b",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo 'error_send_sms';
            } else {
                echo 'success_sms';
            }
        } else {
            echo 'error_update_db';
        }
    } else {
        $sql = "INSERT INTO userProfile (avatar, dni, firstname, lastname, email, phone, codeActivation, status, date) VALUES ('', '', '', '', '', '$phone', '$code', 'pending_activation', '$date')";

        if ($conn->query($sql) === TRUE) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.instasent.com/sms/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"from\":\"Tipper\",\"to\":\"$phone\",\"text\":\"ThankYou Tipper: $code is your confirmation code. Don't reply to this message with your code.\"}",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer 2a3aea0bcee508cb2156a5a5a8bf926488bf9c0b",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo 'error_send_sms';
            } else {
                echo 'success_sms';
            }
        } else {
            echo 'error_insert_db';
        }
    }

    $conn->close();
}