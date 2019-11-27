<?php


namespace App\Parser\Type\Extractor\Images;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\AbstractType;
use App\Parser\Type\Extractor\AbstractExtractorType;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ExtractImage
 * @package App\Parser\Type\Extractor\Images
 */
class ExtractScreenshotType extends AbstractExtractorType
{
    public function extract(string $path, string $content, ?string $attr = null): ?string
    {
        $crawler = new Crawler($content);
        return $crawler->filter($path)->attr('style');
    }
}
