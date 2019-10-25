<?php


namespace App\Parser\Type\Navigation;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\TypeAbstract;

/**
 * Тип делает запрос на страницу и помещает результат в контекст выполнения
 * Class GoToUrl
 * @package App\Parser\Type\Navigation
 */
class GoToUrl extends TypeAbstract
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {
        $responce = $driver->request(
            $this->config->method,
            $this->config->url,
            $this->config->headers,
            $this->config->params,
            $this->config->body
        );

        $context->addResponce($responce);
    }
}
