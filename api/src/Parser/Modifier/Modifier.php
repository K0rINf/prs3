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

    public static function modify(NodeInterface $conditions, DataSource $dataSource, OperationInterface $operation, ...$args)
    {
        $conditionFacade = new ConditionFacade();
        if ($conditionFacade->executeCombineConditions($conditions, $dataSource)) {
            return $operation->execute($args);
        }
    }
}
