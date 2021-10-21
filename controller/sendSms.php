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
$phoneSms = str_replace( '+', '%2B', $_POST['phone'] );
$code = rand(1000, 9999);
$date = date('Y-m-d H:m:s');

// twilloAuthentication
$sql = "SELECT * FROM twilloAuthentication";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        switch ( $row['var'] ) {
            case 'TWILIO_ACCOUNT_SID':
                $TWILIO_ACCOUNT_SID = $row['value'];
            break;

            case 'TWILIO_AUTH_TOKEN':
                $TWILIO_AUTH_TOKEN = $row['value'];
            break;
        }
    }
}

// codeActivation
if ( $caso == 'codeActivation' ) {
    $sql = "SELECT * FROM userProfile WHERE phone = '$phone'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql = "UPDATE userProfile SET codeActivation = '$code' WHERE phone = '$phone'";
        if ($conn->query($sql) === TRUE) {
            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://api.instasent.com/sms/",
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "POST",
            //     CURLOPT_POSTFIELDS => "{\"from\":\"Tipper\",\"to\":\"$phone\",\"text\":\"ThankYou Tipper: $code is your confirmation code. Don't reply to this message with your code.\"}",
            //     CURLOPT_HTTPHEADER => array(
            //         "authorization: Bearer 2a3aea0bcee508cb2156a5a5a8bf926488bf9c0b",
            //         "content-type: application/json"
            //     ),
            // ));

            // $response = curl_exec($curl);
            // $err = curl_error($curl);

            // curl_close($curl);

            // if ($err) {
            //     echo 'error_send_sms';
            // } else {
            //     echo 'success_sms';
            // }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/$TWILIO_ACCOUNT_SID/Messages.json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "From=%2B19039450637&Body=ThankYou Tipper: $code is your confirmation code. Don't reply to this message with your code.&To=$phoneSms");
            curl_setopt($ch, CURLOPT_USERPWD, $TWILIO_ACCOUNT_SID . ':' . $TWILIO_AUTH_TOKEN);

            $headers = array();
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'error_send_sms';
            } else {
                echo 'success_sms';
            }
            curl_close($ch);
        } else {
            echo 'error_update_db';
        }
    } else {
        $sql = "INSERT INTO userProfile (avatar, dni, firstname, lastname, email, phone, superPower, codeActivation, status, date) VALUES ('', '', '', '', '', '$phone', '', '$code', 'pending_activation', '$date')";

        if ($conn->query($sql) === TRUE) {
            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => "https://api.instasent.com/sms/",
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => "",
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 30,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => "POST",
            //     CURLOPT_POSTFIELDS => "{\"from\":\"Tipper\",\"to\":\"$phone\",\"text\":\"ThankYou Tipper: $code is your confirmation code. Don't reply to this message with your code.\"}",
            //     CURLOPT_HTTPHEADER => array(
            //         "authorization: Bearer 2a3aea0bcee508cb2156a5a5a8bf926488bf9c0b",
            //         "content-type: application/json"
            //     ),
            // ));

            // $response = curl_exec($curl);
            // $err = curl_error($curl);

            // curl_close($curl);

            // if ($err) {
            //     echo 'error_send_sms';
            // } else {
            //     echo 'success_sms';
            // }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/$TWILIO_ACCOUNT_SID/Messages.json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "From=%2B19039450637&Body=ThankYou Tipper: $code is your confirmation code. Don't reply to this message with your code.&To=$phoneSms");
            curl_setopt($ch, CURLOPT_USERPWD, $TWILIO_ACCOUNT_SID . ':' . $TWILIO_AUTH_TOKEN);

            $headers = array();
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'error_send_sms';
            } else {
                echo 'success_sms';
            }
            curl_close($ch);
        } else {
            echo 'error_insert_db';
        }
    }

    $conn->close();
}