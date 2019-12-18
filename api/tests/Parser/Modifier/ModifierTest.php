<?php

namespace App\Tests;

use App\Parser\Modifier\Condition\ConditionFacade;
use App\Parser\Modifier\Condition\Node\Combine;
use App\Parser\Modifier\Condition\Node\Condition;
use App\Parser\Modifier\Modifier;
use App\Parser\Modifier\Operation\AdditionOperation;
use App\Parser\Type\Extractor\Extraction\ExtractStyleType;
use PHPUnit\Framework\TestCase;

class ModifierTest extends TestCase
{
    public function testExtractor(): void
    {

        // создаю условие сравнения
        $logicTreeFacade = new ConditionFacade();
        $dataSource = $logicTreeFacade->createDataSource([
            'value_1' => 'toto',
            'value_2' => 10
        ]);
        $expr1 = new Condition('value_1', 'eq', 'toto');
        $expr2 = new Condition('value_2', 'eq', 10);
        $logicTree = new Combine('and', false, [$expr1, $expr2]);
        $operation = new AdditionOperation(3);

        // Add new operator
//        $logicTreeFacade->addOperator(\LogicTree\Operator\OperatorPool::TYPE_COMPARATOR, 'custom_op', new CustomOperator());

        // Execute combine conditions
        var_dump(Modifier::modify($logicTree, $dataSource, , 325));

    }
}
