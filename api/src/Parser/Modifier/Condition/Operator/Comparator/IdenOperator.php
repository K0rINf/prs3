<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The IDENTICAL:
 * The output is "true" if $expr1 is equal to $expr2, and they are of the same type.
 */
final class IdenOperator extends AbstractCompareTwo
{
    public const CODE = 'iden';

    public function executeComparison($expr1, $expr2): bool
    {
        return $expr1 === $expr2;
    }
}
