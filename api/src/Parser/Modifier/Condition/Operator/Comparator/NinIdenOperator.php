<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

use function in_array;

/**
 * The NIN IDENTICAL:
 * The output is "true" if $expr1 is not in list $expr2, and they are of the same type.
 */
final class NinIdenOperator extends AbstractCompareTwo
{
    public const CODE = 'niniden';

    public function executeComparison($expr1, $expr2): bool
    {
        return !in_array($expr1, $expr2, true);
    }
}
