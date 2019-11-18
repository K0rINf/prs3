<?php


namespace App\Parser\Type\Cookies;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\AbstractType;
use Symfony\Component\DomCrawler\Crawler;

class SetCookie extends AbstractType
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {

    }
}
