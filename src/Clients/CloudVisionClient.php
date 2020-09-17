<?php
namespace PhpOCR\Clients;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use PhpOCR\OCRClientInterface;

class CloudVisionClient implements OCRClientInterface
{
    private $options;

    public function __construct($options = [])
    {
        $this->options = $options;
    }

    public function run($image)
    {
        $imageAnnotator = new ImageAnnotatorClient($this->options);

        $response = $imageAnnotator->textDetection($image);
        $texts = $response->getTextAnnotations();

        $text = $texts[0];

        // foreach ($texts as $text) {
        // print($text->getDescription() . PHP_EOL);
        //     // # get bounds
        //     $vertices = $text->getBoundingPoly()->getVertices();
        //     $bounds = [];
        //     foreach ($vertices as $vertex) {
        //         $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
        //     }
        //     // print('Bounds: ' . join(', ', $bounds) . PHP_EOL);
        // }

        $imageAnnotator->close();

        return $text->getDescription();
    }
}
