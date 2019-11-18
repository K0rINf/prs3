<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Operation;

interface OperationInterface
{
    public function execute($value);
}
