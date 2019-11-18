<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The EQUAL:
 * The output is "true" if $expr1 is equal to $expr2 after type juggling.
 */
final class EqOperator extends AbstractCompareTwo
{
    public const CODE = 'eq';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 == $expr2;
    }
}
