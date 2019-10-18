<?php

namespace App\Parser;

// линейный запуск
use App\Parser\Type\Navigation\GoToUrl;

$type = new GoToUrl();
$action = new Action();
$scenario = new Scenario();
$scenario->run();

