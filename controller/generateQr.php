<?php session_start();

include('../library/phpqrcode/qrlib.php');

$codesDir = "/dist/codes/";
$codeFile = date('dmYhis').'.png';
QRcode::png('https://myapp.thankyoutipper.com/payments/?id=+573013808512', $codesDir.$codeFile, 'H', '10');
echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';