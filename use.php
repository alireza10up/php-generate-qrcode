<?php

// autoload composer

require 'vendor/autoload.php';

// Examples of using the class

include 'QRCodeGenerator.php';

$qrGenerator = new QRCodeGenerator();

$data    = "https://www.alireza10up.ir"; // The data to encode in the QR code
$options = [
	'size'   => 400,
	'margin' => 10,
	'logo_path' => 'assets/img/logo.png',
	'label' => 'alireza10up'
];

$qrCodeSvg = $qrGenerator->generate($data, $options);

// Directly output the QR code

header('Content-Type: '.$qrCodeSvg->getMimeType());
echo $qrCodeSvg->getString();
