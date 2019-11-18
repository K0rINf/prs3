<?php


namespace App\Parser\Type\Extractor\Images;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\AbstractType;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ExtractImage
 * @package App\Parser\Type\Extractor\Images
 */
class ExtractScreenshot extends AbstractType
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {

    }
}
