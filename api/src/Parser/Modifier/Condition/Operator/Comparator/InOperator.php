<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

use function in_array;

/**
 * The IN:
 * The output is "true" if $expr1 is in list $expr2 after type juggling.
 */
final class InOperator extends AbstractCompareTwo
{
    public const CODE = 'in';

    public function executeComparison($expr1, $expr2): bool
    {
        return in_array($expr1, $expr2, false);
    }
}
