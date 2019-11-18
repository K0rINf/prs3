<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition\Service;

use App\Parser\Modifier\Condition\DataSource;
use App\Parser\Modifier\Condition\Node\CombineInterface;
use App\Parser\Modifier\Condition\Node\ConditionInterface;
use App\Parser\Modifier\Condition\Node\NodeInterface;
use App\Parser\Modifier\Condition\Operator\OperatorPool;

/**
 * @api
 */
class ConditionManager
{
    /**
     * @var OperatorPool
     */
    private $operatorPool;

    public function __construct(?OperatorPool $operatorPool = null)
    {
        $this->operatorPool = $operatorPool ?? new OperatorPool();
    }

    public function execute(NodeInterface $node, DataSource $dataSource): bool
    {
        $result = true;

        if ($node instanceof CombineInterface) {
            $result = $this->executeCombine($node, $dataSource);
        } elseif ($node instanceof ConditionInterface) {
            $result = $this->executeCondition($node, $dataSource->getValue($node->getValueIdentifier()));
        }

        return $result;
    }

    private function executeCombine(CombineInterface $combine, DataSource $dataSource): bool
    {
        $operator = $this->operatorPool->getOperator(OperatorPool::TYPE_LOGICAL, $combine->getOperator());
        $expressions = [];

        foreach ($combine->getChildren() as $child) {
            $expressions[] = $this->execute($child, $dataSource);
        }

        return ($combine->isInvert() xor $operator->execute(...$expressions));
    }

    private function executeCondition(ConditionInterface $condition, $value): bool
    {
        $operator = $this->operatorPool->getOperator(OperatorPool::TYPE_COMPARATOR, $condition->getOperator());

        return $operator->execute($value, $condition->getValueCompare());
    }
}
