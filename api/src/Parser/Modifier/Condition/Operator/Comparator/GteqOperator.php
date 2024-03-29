<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The GREATER THAN EQUAL:
 * The output is "true" if $expr1 is greater than or equal to $expr2.
 */
final class GteqOperator extends AbstractCompareTwo
{
    public const CODE = 'gteq';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 >= $expr2;
    }
}
