<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Operation;

class AdditionOperation extends AbstractOperation
{
    public function execute($value)
    {
        return $this->source + $value;
    }
}
