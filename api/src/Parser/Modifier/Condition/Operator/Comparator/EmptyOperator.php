<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The EMPTY:
 * The output is "true" if $expression is empty
 */
final class EmptyOperator extends AbstractCompareOne
{
    public const CODE = 'empty';

    public function executeComparison($expression): bool
    {
        return empty($expression);
    }
}
