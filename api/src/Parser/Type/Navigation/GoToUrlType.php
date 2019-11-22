<?php


namespace App\Parser\Type\Navigation;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Driver\DriverInterface;
use App\Parser\Type\ConfigArgument;
use App\Parser\Type\AbstractType;

/**
 * Тип делает запрос на страницу и помещает результат в контекст выполнения
 * Class GoToUrl
 * @package App\Parser\Type\Navigation
 */
class GoToUrl extends AbstractType
{
    protected function configure(): void
    {
        $this->addArgument('url', ConfigArgument::REQUIRED, 'url want to go');
    }

    public function run(Context $context) {
        $url = $this->getArgument('url');

        $responce = $context->getDriver()->request(
            $this->config->method,
            $this->config->url,
            $this->config->headers,
            $this->config->params,
            $this->config->body
        );

        $context->addResponce($responce);
    }
}
