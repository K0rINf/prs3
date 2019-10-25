<?php

namespace App\Parser;

class Context
{
    private $input;
    private $output;
    private $responses;

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

    //@todo: типизировать респонс
    public function addResponce($responce): void
    {
        $this->responses[] = $responce;
    }

    public function getLastResponce() {
        return $this->responses[count($this->responses) - 1];
    }

    public function save() {

    }
}

