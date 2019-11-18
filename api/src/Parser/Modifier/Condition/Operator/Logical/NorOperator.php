<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Logical;

use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use function count;

/**
 * The NOR:
 * The output is "true" if both inputs are "false". Otherwise, the output is "false".
 */
final class NorOperator implements OperatorInterface
{
    public const CODE = 'nor';

    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = !($result || $expressions[$i]);
        }

        return $result;
    }
}
