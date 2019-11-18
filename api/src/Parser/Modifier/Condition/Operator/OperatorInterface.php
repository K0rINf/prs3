<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator;

interface OperatorInterface
{
    /**
     * Execute operator for the expressions
     *
     * @param array ...$expressions
     * @return bool
     */
    public function execute(...$expressions): bool;
}
