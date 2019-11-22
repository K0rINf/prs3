<?php

namespace App\Parser;

// линейный запуск
use App\Parser\Driver\ServerDriver;
use App\Parser\Modifier\Modifier;
use App\Parser\Type\Extractor\Extraction\ExtractAttribute;
use App\Parser\Type\Extractor\Extraction\ExtractValue;
use App\Parser\Type\Navigation\GoToUrl;

$modifiers = [];

$scenario = new Scenario(
    [
        new Branch(
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
        new Branch(
            new Context(new Input(), new Output(), new ServerDriver()),
            [],
        ),
    ],
);
$scenario->run();

