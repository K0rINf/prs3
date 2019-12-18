<?php


namespace App\Parser\Type\Extractor;


use App\Parser\Context;
use App\Parser\Type\AbstractType;
use App\Parser\Type\ConfigArgument;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Общий тип для всех екстракторов данных
 * Class AbstractExtractorType
 * @package App\Parser\Type\Extractor
 */
abstract class AbstractExtractorType extends AbstractType
{
    abstract public function extract(string $path, string $content, ?string $attr = null): ?string;

    protected function configure(): void
    {
        $this->addArgument('output', ConfigArgument::REQUIRED, 'Name output element.');
        $this->addArgument('path', ConfigArgument::REQUIRED, 'The XPath or CSS3 path element.');
        $this->addArgument('attr', ConfigArgument::OPTIONAL, 'attribute element.');
        $this->addArgument('append', ConfigArgument::OPTIONAL, 'append or set value in output.', false);
    }

    public function run(Context $context)
    {
        $path = $this->getArgument('path');
        $name = $this->getArgument('output');
        $append = $this->getArgument('append');
        $attr = $this->getArgument('attr');

        $response = $context->getLastResponse();
        $value = $this->extract($path, $response->getContent(), $attr);

        if ($append) {
            $context->getOutput()->add($name, $value);
        } else {
            $context->getOutput()->set($name, $value);
        }
    }

}
