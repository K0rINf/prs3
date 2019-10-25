<?php

namespace App\Parser\Driver;

abstract class DriverAbstract
{
    abstract public function request(string $method, string $url, array $headers, array $params, string $body = '');
}
