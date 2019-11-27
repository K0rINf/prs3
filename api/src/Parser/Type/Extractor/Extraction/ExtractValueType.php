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
    public function extract(string $path, string $content, ?string $attr = null): ?string
    {
        $crawler = new Crawler($content);
        return $crawler->filter($path)->text();
    }
}
