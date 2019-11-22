<?php

namespace App\Parser\Driver;

/**
 * Драйвер обеспечивает HTTP запрос и HTTP ответ.
 *
 * @todo: Могут быть конфиги для драйвера в виде списка прокси, или настроек для прохождения CAPTCHA
 *
 * Interface DriverInterface
 * @package App\Parser\Driver
 */
interface DriverInterface
{
    public function request(string $method, string $url, array $headers, array $params, string $body = '');
}
