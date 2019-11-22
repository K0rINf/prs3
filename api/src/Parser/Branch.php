<?php

namespace App\Parser;

use App\Parser\Driver\DriverInterface;

/**
 * Class Branch
 *
 * Это граф всех actions которые должны выполнится в одном общем контексте.
 * Ветка имеет общий контекст выполнения для всех actions.
 *
 * @package App\Parser
 */
class Branch
{
    protected $context;
    protected $actions;

    /**
     * Branch constructor.
     *
     * @param Context $context
     * @param array   $actions
     */
    public function __construct(Context $context, array $actions)
    {
        $this->context = $context;
        $this->actions = $actions;
    }

    /**
     * Выполенние каждого action и сохранение его в контексте
     */
    public function run() {
        foreach ($this->actions as $action) {
            /* @var Action $action */
            $action->run($this->context);
            $this->context->addAction($action);
        }
    }
}
