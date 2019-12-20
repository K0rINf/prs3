<?php

namespace App\Tests;

use App\Parser\Context;
use App\Parser\Modifier\Condition\Node\Combine;
use App\Parser\Modifier\Condition\Node\Condition;
use App\Parser\Modifier\Modifier;
use App\Parser\Modifier\Operation\AdditionOperation;
use PHPUnit\Framework\TestCase;

class ModifierTest extends TestCase
{
    public function testExtractor(): void
    {

        // создаю условие сравнения
        $expr1 = new Condition('value_1', 'eq', 'toto');
        $expr2 = new Condition('value_2', 'eq', 10);
        $logicTree = new Combine('and', false, [$expr1, $expr2]);

        $operation = new AdditionOperation(3);

        $context = $this->createMock(Context::class);

        // Add new operator
//        $logicTreeFacade->addOperator(\LogicTree\Operator\OperatorPool::TYPE_COMPARATOR, 'custom_op', new CustomOperator());

        $modifier = new Modifier($logicTree, $operation);

        $modifyValue = $modifier->modify($context, 500);
        $this->assertEquals($modifyValue, 503);

    }
}
