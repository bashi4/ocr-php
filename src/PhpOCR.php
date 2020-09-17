<?php

namespace PhpOCR;

use PhpOCR\OCRClientInterface;

class PhpOCR
{
    /** @var OCRClientInterface */
    protected $ocrClient;

    public function __construct(OCRClientInterface $ocrClient)
    {
        $this->ocrClient = $ocrClient;
    }

    public function run($image)
    {
        return $this->ocrClient->run($image);
    }
}
