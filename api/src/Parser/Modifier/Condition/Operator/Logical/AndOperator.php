<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Logical;

use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use function count;

/**
 * The AND:
 * The output is "true" when both inputs are "true.". Otherwise, the output is "false".
 */
final class AndOperator implements OperatorInterface
{
    public const CODE = 'and';

    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $result && $i < $count; $i++) {
            $result = $result && $expressions[$i];
        }

        return $result;
    }
}
