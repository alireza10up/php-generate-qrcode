<?php

use Endroid\QrCode\QrCode;

class MyQRCodeGenerator {
	public function generate($data, $options = []): array {

		$qrCode = new QrCode($data);

		$qrCode->setErrorCorrectionLevel($options['errorCorrectionLevel'] ?? QrCode::LEVEL_L);
		$qrCode->setSize($options['size'] ?? 300);
		$qrCode->setMargin($options['margin'] ?? 10);

		if (isset($options['logo'])) {
			$qrCode->setLogoPath($options['logo']);
			$qrCode->setLogoSize(50);
		}

		return [
			'svg' => $qrCode->getSvgCode(),
			'png' => $qrCode->asPNGString()
		];
	}
}
