<?php


namespace App\Parser\Type\Extractor\Images;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\TypeAbstract;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ExtractImage
 * @package App\Parser\Type\Extractor\Images
 */
class ExtractOcr extends TypeAbstract
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {

    }
}
