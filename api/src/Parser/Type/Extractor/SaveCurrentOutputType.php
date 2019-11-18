<?php


namespace App\Parser\Type\Extractor;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\AbstractType;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class SaveCurrentOutput
 * @package App\Parser\Type\Extractor
 */
class SaveCurrentOutput extends AbstractType
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {

    }
}
