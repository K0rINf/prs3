<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Operation;

interface OperationInterface
{
    // приминение операции к source с параметром $args с аргументами
    public function execute($value);
}
