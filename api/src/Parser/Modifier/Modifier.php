<?php

declare(strict_types=1);

namespace App\Parser\Modifier;

use App\Parser\Context;
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
 * Модификатор должен изменить значение которое вернул Тип элемента(AbstractType)
 * в зависимости от выполнения условий ($conditions)
 *
 */
class Modifier
{
    protected $conditions;
    protected $operation;
    protected $conditionFacade;

    public function __construct(NodeInterface $conditions, OperationInterface $operation)
    {
        $this->conditions = $conditions;
        $this->operation = $operation;
        $this->conditionFacade = new ConditionFacade();
    }

    /**
     * Приминение модификатора к $value. Conditions будут применятся к output данным контекста
     * @param Context $context
     * @param         $value
     *
     * @return mixed
     */
    public function modify(Context $context, $value)
    {
        // получаю датасоурс массив из контекста;
        // @todo: Условия могут применятся и к Input данным из контекста. К примеру я хочу на каждый четный запуск применять модификатор
        $dataSource = new DataSource($context->getOutput()->getAll());

        if ($this->conditionFacade->executeCombineConditions($this->conditions, $dataSource)) {
            return $this->operation->execute($value);
        }

        return $value;
    }
}
