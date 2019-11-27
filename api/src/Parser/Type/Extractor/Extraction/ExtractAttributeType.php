<?php


namespace App\Parser\Type\Extractor\Extraction;

use App\Parser\Type\ConfigArgument;
use App\Parser\Type\Extractor\AbstractExtractorType;
use Symfony\Component\DomCrawler\Crawler;

class ExtractAttributeType extends AbstractExtractorType
{
    protected function configure(): void
    {
        parent::configure();
        $this->addArgument('attr', ConfigArgument::REQUIRED, 'attribute element.');
    }

    public function extract(string $path, string $content, ?string $attr = null): ?string
    {
        $crawler = new Crawler($content);
        return $crawler->filter($path)->attr($attr);
    }
}
