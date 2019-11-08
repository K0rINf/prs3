<?php

namespace App\Parser;

// линейный запуск
use App\Parser\Driver\ServerDriver;
use App\Parser\Type\Extractor\Extraction\ExtractAttribute;
use App\Parser\Type\Extractor\Extraction\ExtractValue;
use App\Parser\Type\Navigation\GoToUrl;

$type = ;

$typeExtract = ;
$typeExtractAttribute = ;

$branch1 = ;

$branch2 = new Branch(
    new Input(),
    new Output(),
    [
        $action1,
        $action3,
    ]
);


$scenario = new Scenario(
    [new Branch(
        new Input(),
        new Output(),
        [
            new Action(
                'first',
                new GoToUrl([
                    // конструктор проверит наличие всех необходимых ключей и правильность их заполнения
                    'url' => 'http://ya.ru'
                ])
            ),
            new Action(
                'second',
                new ExtractValue([
                    'path' => '.class > #el1',
                ])
            ),
            new Action(
                'three',
                new ExtractAttribute([
                    'path' => '.class > #el1',
                    'attribute' => 'href',
                ], $modifiers)
            )
        ]
    ),
        $branch2
    ],
    new ServerDriver()
);
$scenario->run();

