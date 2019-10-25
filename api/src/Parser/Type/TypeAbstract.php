<?php

namespace App\Parser\Type;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;

abstract class TypeAbstract
{
    protected $config;

    abstract function run(Context $context, DriverAbstract $driver);
}
