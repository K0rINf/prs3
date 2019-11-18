<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

/**
 * The NULL:
 * The output is "true" if $expression is not null
 */
final class NotNullOperator extends AbstractCompareOne
{
    public const CODE = 'notnull';

    public function executeComparison($expression): bool
    {
        return $expression !== null;
    }
}
