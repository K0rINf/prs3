<?php

namespace App\Tests;

use App\Parser\Action;
use App\Parser\Branch;
use App\Parser\Context;
use App\Parser\Driver\ServerDriver;
use App\Parser\Input;
use App\Parser\Modifier\Modifier;
use App\Parser\Output;
use App\Parser\Type\Extractor\Extraction\ExtractValueType;
use App\Parser\Type\Navigation\GoToUrl;
use PHPUnit\Framework\TestCase;

class BranchTest extends TestCase
{
    public function testBranch(): void
    {
        $branch = new Branch(
            new Context(new Input(), new Output(), new ServerDriver()),
            [
                new Action(
                    'first',
                    new GoToUrl(
                        [
                            // конструктор проверит наличие всех необходимых ключей и правильность их заполнения
                            'url' => 'http://ya.ru',
                        ],
                        [
                            new Modifier(

                            ),
                        ]
                    )
                ),
                new Action(
                    'second',
                    new ExtractValue(
                        [
                            'path' => '.class > #el1',
                        ]
                    )
                ),
                new Action(
                    'three',
                    new ExtractAttribute(
                        [
                            'path' => '.class > #el1',
                            'attribute' => 'href',
                        ], $modifiers
                    )
                ),
            ],
        ),
    }
}
