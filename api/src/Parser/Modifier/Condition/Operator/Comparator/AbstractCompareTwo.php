<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Operator\Comparator;

use InvalidArgumentException;
use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use function count;

abstract class AbstractCompareTwo implements OperatorInterface
{
    public function execute(...$expressions): bool
    {
        $count = count($expressions);

        if ($count !== 2) {
            throw new InvalidArgumentException('2 expressions expected, ' . $count . ' given.');
        }

        return $this->executeComparison($expressions[0], $expressions[1]);
    }

    /**
     * Execute the comparison for expressions
     *
     * @param mixed $expr1
     * @param mixed $expr2
     * @return bool
     */
    abstract public function executeComparison($expr1, $expr2): bool;
}
