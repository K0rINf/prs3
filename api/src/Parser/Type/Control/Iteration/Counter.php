<?php


namespace App\Parser\Type\Control\Iteration;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\TypeAbstract;
use Symfony\Component\DomCrawler\Crawler;

class Counter extends TypeAbstract
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {

    }
}
