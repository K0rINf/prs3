<?php


namespace App\Parser\Type\Extractor\Extraction;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\TypeAbstract;
use Symfony\Component\DomCrawler\Crawler;

class ExtractLocation extends TypeAbstract
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {

    }
}
