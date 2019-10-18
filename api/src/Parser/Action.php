<?php

namespace App\Parser;

class Action
{
    public const ERROR_MODE_IGNORE = 'IGNORE';
    public const ERROR_MODE_REPORT_HERE = 'REPORT_HERE';
    public const ERROR_MODE_SKIP = 'SKIP';

    protected $title;
    protected $maxRetries;
    protected $errorMode;
    protected $errorMessage;

    /**
     * @var array $next
     */
    protected $next;
}
