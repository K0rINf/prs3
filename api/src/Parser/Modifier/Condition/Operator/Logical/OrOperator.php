<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Logical;

use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use function count;

/**
 * The OR:
 * The output is "true" if either or both of the inputs are "true".
 * If both inputs are "false," then the output is "false".
 */
final class OrOperator implements OperatorInterface
{
    public const CODE = 'or';

    public function execute(...$expressions): bool
    {
        $count = count($expressions);
        $result = $expressions[0];

        for ($i = 1; $i < $count; $i++) {
            $result = $result || $expressions[$i];
        }

        return $result;
    }
}
