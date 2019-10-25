<?php


namespace App\Parser\Type\Navigation;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\TypeAbstract;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Тип пытается извлечь элемент из последнего респонса
 * Class ExtractValue
 * @package App\Parser\Type\Navigation
 */
class ExtractValue extends TypeAbstract
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {
        $response = $context->getLastResponce();
        $crawler = new Crawler($response->getBody());

        $value = $crawler->filter($this->config->path)->text();

        if ($this->config->output) {
            if ($this->config->append) {
                $value = $context->getOutputVariable($this->config->output) . $value;
                $context->setOutputVariable($this->config->output, $value);
            } else {
                $context->setOutputVariable($this->config->output, $value);
            }
        }
    }
}
