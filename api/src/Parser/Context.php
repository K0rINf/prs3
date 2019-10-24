<?php

namespace App\Parser;

class Context
{
    private $input;
    private $output;

    /**
     * Context constructor.
     *
     * @param Input  $input
     * @param Output $output
     */
    public function __construct(Input $input, Output $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    public function save() {

    }
}

