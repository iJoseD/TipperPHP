<?php

require_once('../aws/aws-autoloader.php');

use \Aws\Sns\SnsClient;
use \Aws\Exception\AwsException;

$SnSclient = new SnsClient([
    'credentials' => array(
        'key' => 'AKIAVLH2HXALM36ADNHM',
        'secret' => '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',
    ),
    'profile' => 'default',
    'region' => 'us-east-1',
    'version' => '2010-03-31'
]);

$message = 'This message is sent from a Amazon SNS code sample.';
$phone = '+573013808512';

// $result = $SnSclient->publish([
//     'Message' => $message,
//     'PhoneNumber' => $phone,
// ]);

$result = $SnSclient->publish([
    'Message' => $message,
    'MessageAttributes' => [
        'String' => [
            'DataType' => 'String',
            'StringValue' => 'Transactional',
        ],
    ],
    'MessageStructure' => 'SMS',
    'PhoneNumber' => $phone,
]);

var_dump($result);

echo 'Hola x5';

// var_dump($result);

// try {
//     $result = $SnSclient->publish([
//         'Message' => $message,
//         'PhoneNumber' => $phone,
//     ]);
//     var_dump($result);
// } catch (AwsException $e) {
//     error_log($e->getMessage());
// }