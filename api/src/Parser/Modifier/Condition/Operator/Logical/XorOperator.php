<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Logical;

use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use function count;

/**
 * The XOR (exclusive-OR):
 * The output is "false" if both inputs are "false" or if both inputs are "true".
 */
final class XorOperator implements OperatorInterface
{
    public const CODE = 'xor';

    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = ($result xor $expressions[$i]);
        }

        return $result;
    }
}
