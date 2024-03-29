<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The LESS THAN:
 * The output is "true" if $expr1 is strictly less than $expr2.
 */
final class LtOperator extends AbstractCompareTwo
{
    public const CODE = 'lt';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 < $expr2;
    }
}
