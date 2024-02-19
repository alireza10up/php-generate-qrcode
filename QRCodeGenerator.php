<?php

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\Result\ResultInterface;

class QRCodeGenerator
{
	public function generate($data, $options = []): ResultInterface {
		$writer = new PngWriter();

		// Create Qr Code
		$qrCode = QrCode::create($data)
		                ->setSize($options['size'] ?? 300)
						->setMargin($options['margin'] ?? 10);

		// Create generic logo
		if($options['logo_path']) {
			$logo = Logo::create(__DIR__ . DIRECTORY_SEPARATOR . $options['logo_path'])
			            ->setResizeToWidth(50)
			            ->setPunchoutBackground(true);
		}

		// Create generic label
		if($options['label']) {
			$label = Label::create($options['label'])
			              ->setTextColor(new Color(255, 0, 0));
		}

		$result = $writer->write($qrCode, $logo ?? null, $label ?? null);

		// save file

		$result->saveToFile(__DIR__ . DIRECTORY_SEPARATOR . 'exportQrCode/qrcode.png');

		return $result;
	}
}
