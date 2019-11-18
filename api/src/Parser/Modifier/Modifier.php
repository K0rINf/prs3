<?php

declare(strict_types=1);

namespace App\Parser\Modifier;

use App\Parser\Modifier\Condition\ConditionFacade;
use App\Parser\Modifier\Condition\Node\NodeInterface;
use App\Parser\Modifier\Condition\DataSource;
use App\Parser\Modifier\Operation\OperationInterface;

/**
 * Class Modifier
 * @package App\Parser\Modifier
 * @todo: need interface
 * @todo: need config
 *
 */
class Modifier
{
    /**
     * Modifier constructor.
     */
    public function __construct($modifierConfig)
    {
    }

    public function __invoke(NodeInterface $node, DataSource $dataSource, OperationInterface $operation)
    {
        $conditionFacade = new ConditionFacade();
        if ($conditionFacade->executeCombineConditions($node, $dataSource)) {
            return $operation->execute($dataSource);
        }
    }
}
