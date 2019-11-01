<?php

namespace App\Parser;

// линейный запуск
use App\Parser\Driver\ServerDriver;
use App\Parser\Type\Navigation\ExtractAttribute;
use App\Parser\Type\Navigation\ExtractValue;
use App\Parser\Type\Navigation\GoToUrl;

$type = new GoToUrl([
    // конструктор проверит наличие всех необходимых ключей и правильность их заполнения
    'url' => 'http://ya.ru'
]);

$typeExtract = new ExtractValue([
    'path' => '.class > #el1',
]);
$typeExtractAttribute = new ExtractAttribute([
    'path' => '.class > #el1',
    'attribute' => 'href',
], $modifiers);

$action1 = new Action(
    'first',
    $type
);
$action2 = new Action(
    'second',
    $typeExtract
);
$action3 = new Action(
    'three',
    $typeExtractAttribute
);


$branch1 = new Branch(
    new Input(),
    new Output(),
    [
        $action1,
        $action2,
    ]
);

$branch2 = new Branch(
    new Input(),
    new Output(),
    [
        $action1,
        $action3,
    ]
);


$scenario = new Scenario(
    [$branch, $branch2],
    new ServerDriver()
);
$scenario->run();

