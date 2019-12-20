<?php

namespace App\Parser;

use App\Parser\Driver\DriverInterface;
use Symfony\Component\BrowserKit\Response;

class Context
{
    private $input;
    private $output;
    private $responses = [];
    private $actions = [];
    private $driver;

    /**
     * Context constructor.
     *
     * @param Input  $input
     * @param Output $output
     */
    public function __construct(Input $input, Output $output, DriverInterface $driver)
    {
        $this->input = $input;
        $this->output = $output;
        $this->driver = $driver;
    }
    
    public function addResponse(Response $response): array
    {
        $this->responses[] = $response;
        return $this->responses;
    }

    public function getLastResponse(): ?Response {
        return $this->responses[count($this->responses) - 1];
    }

    public function addAction(Action $action): array
    {
        $this->actions[] = $action;
        return $this->actions;
    }

    /**
     * @return Input
     */
    public function getInput(): Input
    {
        return $this->input;
    }

    /**
     * @return Output
     */
    public function getOutput(): Output
    {
        return $this->output;
    }

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * @return DriverInterface
     */
    public function getDriver(): DriverInterface
    {
        return $this->driver;
    }
}

