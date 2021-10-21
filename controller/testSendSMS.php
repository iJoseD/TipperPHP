<?php

require_once('../aws/aws-autoloader.php');
// require '../aws/Aws/Sns/SnsClient.php';
// require '../aws/Aws/Exception/AwsException.php';

use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

$SnSclient = new SnsClient([
    'profile' => 'default',
    'region' => 'us-east-1',
    'version' => '2010-03-31'
]);

$message = 'This message is sent from a Amazon SNS code sample.';
$phone = '+573013808512';

$result = $SnSclient->publish([
    'Message' => $message,
    'PhoneNumber' => $phone,
]);

var_dump($result);

// try {
//     $result = $SnSclient->publish([
//         'Message' => $message,
//         'PhoneNumber' => $phone,
//     ]);
//     var_dump($result);
// } catch (AwsException $e) {
//     error_log($e->getMessage());
// }