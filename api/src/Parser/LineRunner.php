<?php

namespace App\Parser;

// линейный запуск
use App\Parser\Driver\ServerDriver;
use App\Parser\Type\Navigation\ExtractAttribute;
use App\Parser\Type\Navigation\ExtractValue;
use App\Parser\Type\Navigation\GoToUrl;

$type = new GoToUrl();
$typeExtract = new ExtractValue();
$typeExtractAttribute = new ExtractAttribute();

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

