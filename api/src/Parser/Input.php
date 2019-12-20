<?php

namespace App\Parser;


/**
 * Class Input
 * @package App\Parser
 *
 * Входящие значения для парсера. Определяются в рантайме запуска.
 */
class Input
{
    /**
     * @var int $runId Идентификатор запуска парсера
     */
    protected $runId;
    
    protected $variables;

}
