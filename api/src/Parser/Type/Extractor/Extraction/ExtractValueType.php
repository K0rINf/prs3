<?php


namespace App\Parser\Type\Extractor\Extraction;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\ConfigArgument;
use App\Parser\Type\AbstractType;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Тип пытается извлечь элемент из последнего респонса
 * Class ExtractValue
 * @package App\Parser\Type\Navigation
 */
class ExtractValue extends AbstractType
{
    protected function configure(): void
    {
        $this->addArgument('path', ConfigArgument::REQUIRED, 'The XPath or CSS3 path element.');
    }

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
