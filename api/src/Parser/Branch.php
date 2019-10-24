<?php

namespace App\Parser;

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

    public function run() {
        foreach ($this->actions as $action) {
            $action->run($this->context)
        }
    }
}
