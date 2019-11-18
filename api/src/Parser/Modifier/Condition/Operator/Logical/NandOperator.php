<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Logical;

use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use function count;

/**
 * The NAND:
 * The output is "false" if both inputs are "true". Otherwise, the output is "true".
 */
final class NandOperator implements OperatorInterface
{
    public const CODE = 'nand';

    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = !($result && $expressions[$i]);
        }

        return $result;
    }
}
