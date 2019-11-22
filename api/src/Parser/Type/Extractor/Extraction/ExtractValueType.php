<?php


namespace App\Parser\Type\Extractor\Extraction;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\Extractor\AbstractExtractorType;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Тип пытается извлечь элемент из последнего HTTP ответа
 * Class ExtractValue
 * @package App\Parser\Type\Navigation
 */
class ExtractValueType extends AbstractExtractorType
{
    public function run(Context $context)
    {
        $path = $this->getArgument('path');
        $name = $this->getArgument('output');
        $append = $this->getArgument('append');

        $response = $context->getLastResponce();
        $crawler = new Crawler($response->getBody());

        $value = $crawler->filter($path)->text();

        if ($append) {
            $context->getOutput()->add($name, $value);
        } else {
            $context->getOutput()->set($name, $value);
        }
    }
}
