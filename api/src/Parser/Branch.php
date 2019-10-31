<?php

namespace App\Parser;

/**
 * Class Branch
 *
 * Ветка имеет общий контекст выполнения для всех actions. Это граф всех actions которые должны
 * выполнится в одном контексте.
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
     * @param Input  $input
     * @param Output $output
     * @param array  $actions
     */
    public function __construct(Input $input, Output $output, array $actions)
    {
        $this->context = new Context($input, $output);
        $this->actions = $actions;
    }

    public function run() {
        foreach ($this->actions as $action) {
            /* @var Action $action */
            $action->run($this->context);
            $this->context->addAction($action);
        }
    }
}
