<?php

namespace App\Parser;

// линейный запуск
use App\Parser\Driver\ServerDriver;
use App\Parser\Type\Navigation\GoToUrl;

$type = new GoToUrl();
$action1 = new Action(
    'first',
    $type
);
$action2 = new Action(
    'first',
    $type
);
$branch = new Branch(
    new Input(),
    new Output(),
    [
        $action1,
        $action2,
    ]
);


$scenario = new Scenario(
    [$branch],
    new ServerDriver()
);
$scenario->run();

