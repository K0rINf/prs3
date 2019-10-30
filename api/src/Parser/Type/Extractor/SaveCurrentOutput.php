<?php


namespace App\Parser\Type\Extractor;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\TypeAbstract;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class SaveCurrentOutput
 * @package App\Parser\Type\Extractor
 */
class SaveCurrentOutput extends TypeAbstract
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {

    }
}
