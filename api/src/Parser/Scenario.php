<?php

namespace App\Parser;

class Scenario
{
    private $branches;
    private $commandBus;

    /**
     * Scenario constructor.
     *
     * @param array $branches
     * @param       $commandBus
     */
    public function __construct(array $branches, MessageBusInterface $commandBus)
    {
        $this->branches = $branches;
        $this->commandBus = $commandBus;
    }


    public function run() {
        foreach ($this->branches as $branch) {
            $message = new BranchMessage($branch);
            $this->commandBus->dispath($message);
        }
    }
}
