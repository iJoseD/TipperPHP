<?php session_start();

// MySQLi
$servername = "localhost";
$username   = "app_tipper_user";
$password   = "Ma3h!h57";
$dbname     = "app_tipper";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// Session
$phone = $_SESSION['phone'];

// Var
$directorio = $_SERVER['DOCUMENT_ROOT'].'/dist/img-profile/';
$nombre_img = $_FILES['imagen']['name'];
$tipo       = $_FILES['imagen']['type'];

if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/gif")) {
            move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);
            $sql = "UPDATE userProfile SET avatar = '$avatar' WHERE phone = '$phone'";
            $_SESSION['avatar'] = $directorio.$nombre_img;
            echo $directorio.$nombre_img;
    } else {
        echo "error_formato_imagen";
    }
} else {
    echo "error_array_files";
}

$conn->close();