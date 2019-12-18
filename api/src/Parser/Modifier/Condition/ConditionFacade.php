<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Condition;

use App\Parser\Modifier\Condition\Node\NodeInterface;
use App\Parser\Modifier\Condition\Operator\OperatorInterface;
use App\Parser\Modifier\Condition\Operator\OperatorPool;
use App\Parser\Modifier\Condition\Service\ConditionManager;

class ConditionFacade
{
    /**
     * @var ConditionManager
     */
    private $conditionManager;

    /**
     * @var OperatorPool
     */
    private $operatorPool;

    public function __construct(?ConditionManager $conditionManager = null)
    {
        $this->operatorPool = new OperatorPool();
        $this->conditionManager = $conditionManager ?? new ConditionManager($this->operatorPool);
    }

    public function addOperator(string $type, string $operatorCode, OperatorInterface $operator): ConditionFacade
    {
        $this->operatorPool->addOperator($type, $operatorCode, $operator);
        return $this;
    }

    public function createDataSource(iterable $data): DataSource
    {
        return new DataSource($data);
    }

    public function executeCombineConditions(NodeInterface $node, DataSource $dataSource): bool
    {
        return $this->conditionManager->execute($node, $dataSource);
    }
}
