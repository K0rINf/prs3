<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The NULL:
 * The output is "true" if $expression is null
 */
final class NullOperator extends AbstractCompareOne
{
    public const CODE = 'null';

    public function executeComparison($expression): bool
    {
        return $expression === null;
    }
}
