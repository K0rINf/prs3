<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

use function in_array;

/**
 * The NIN:
 * The output is "true" if $expr1 is not in list $expr2 after type juggling.
 */
final class NinOperator extends AbstractCompareTwo
{
    public const CODE = 'nin';

    public function executeComparison($expr1, $expr2): bool
    {
        return !in_array($expr1, $expr2, false);
    }
}
