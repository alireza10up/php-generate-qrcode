<?php

use Endroid\QrCode\QrCode;

// Examples of using the class

include 'QRCodeGenerator.php';

$qrGenerator = new QRCodeGenerator();

$data    = "https://www.example.com"; // The data to encode in the QR code
$options = [
	'errorCorrectionLevel' => QrCode::LEVEL_M,
	'size'                 => 400,
	'logo'                 => __DIR__.DIRECTORY_SEPARATOR.'assets/img.png',
];

$qrCodeSvg = $qrGenerator->generate($data, $options);
