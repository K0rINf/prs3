<?php


namespace App\Parser\Type\Extractor;


use App\Parser\Type\AbstractType;
use App\Parser\Type\ConfigArgument;

abstract class AbstractExtractorType extends AbstractType
{
    protected function configure(): void
    {
        $this->addArgument('path', ConfigArgument::REQUIRED, 'The XPath or CSS3 path element.');
        $this->addArgument('output', ConfigArgument::OPTIONAL, 'Name output element.');
        $this->addArgument('append', ConfigArgument::OPTIONAL, 'append or set value in output.', false);
    }

}
