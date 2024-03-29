<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The LESS THAN EQUAL:
 * The output is "true" if $expr1 is less than or equal to $expr2.
 */
final class LteqOperator extends AbstractCompareTwo
{
    public const CODE = 'lteq';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 <= $expr2;
    }
}
