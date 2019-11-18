<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Logical;

use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use function count;

/**
 * The XNOR (exclusive-NOR):
 * The output is "true" if the inputs are the same, and "false" if the inputs are different.
 */
final class XnorOperator implements OperatorInterface
{
    public const CODE = 'xnor';

    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = !($result xor $expressions[$i]);
        }

        return $result;
    }
}
