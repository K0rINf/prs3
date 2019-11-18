<?php

declare(strict_types=1);

namespace App\Parser\Modifier\Operation;

abstract class AbstractOperation implements OperationInterface
{
    protected $source;

    public function __construct($source)
    {
        $this->source = $source;
    }
}
