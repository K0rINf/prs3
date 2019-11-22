<?php

namespace App\Parser\Driver;

class SeleniumDriver implements DriverInterface
{
    protected $client;

    public function request(string $method, string $url, array $headers, array $params, string $body = '') {

    }
}
