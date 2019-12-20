<?php


namespace App\Parser\Type\Extractor;


use App\Parser\Context;
use App\Parser\Modifier\Modifier;
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
    protected $modifiers = [];

    abstract public function extract(string $path, string $content, ?string $attr = null): ?string;

    /**
     * @param array         $options Массив с параметрами для типа
     * @param iterable|null $modifiers
     */
    public function __construct(array $options, iterable $modifiers = null)
    {
        parent::__construct($options);
        $this->modifiers = $modifiers;
    }

    protected function configure(): void
    {
        $this->addArgument('output', ConfigArgument::REQUIRED, 'Name output element.');
        $this->addArgument('path', ConfigArgument::REQUIRED, 'The XPath or CSS3 path element.');
        $this->addArgument('attr', ConfigArgument::OPTIONAL, 'attribute element.');
        $this->addArgument('append', ConfigArgument::OPTIONAL, 'append or set value in output.', false);
    }

    public function run(Context $context)
    {
        $value = null;
        $path = $this->getArgument('path');
        $name = $this->getArgument('output');
        $append = $this->getArgument('append');
        $attr = $this->getArgument('attr');

        $response = $context->getLastResponse();
        if ($response) {
            $value = $this->extract($path, $response->getContent(), $attr);
        }

        // обработка модификаторов
        foreach ($this->modifiers as $modifier) {
            /* @var $modifier Modifier */
            $value = $modifier->modify($context, $value);
        }

        if ($append) {
            $context->getOutput()->add($name, $value);
        } else {
            $context->getOutput()->set($name, $value);
        }

        return $value;
    }
}
