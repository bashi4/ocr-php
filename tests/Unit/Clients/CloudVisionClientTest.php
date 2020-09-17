<?php

namespace PhpOCR\Tests\Unit\Clients;

use PhpOCR\Clients\CloudVisionClient;
use PHPUnit\Framework\TestCase;

class CloudVisionClientTest extends TestCase
{
    public function testRun()
    {
        $image = file_get_contents(TEST_DATA_DIR . "test_01.png");
        $client = new CloudVisionClient();
        $text = $client->run($image);
        $this->assertIsString($text);
    }
}
