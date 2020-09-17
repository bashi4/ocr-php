<?php

namespace PhpOCR\Tests\Unit;

use PhpOCR\Clients\CloudVisionClient;
use PhpOCR\PhpOCR;
use PHPUnit\Framework\TestCase;

class PhpOCRTest extends TestCase
{
    public function testCreateInstance()
    {
        $phpOCRTest = new PhpOCR(new CloudVisionClient());

        $image = file_get_contents(TEST_DATA_DIR . "test_01.png");
        $text = $phpOCRTest->run($image);

        $this->assertIsString($text);
    }
}
