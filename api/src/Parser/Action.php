<?php

namespace App\Parser;

use App\Parser\Type\TypeAbstract;
use RuntimeException;

class Action
{
    public const ERROR_MODE_IGNORE = 'IGNORE';
    public const ERROR_MODE_REPORT_HERE = 'REPORT_HERE';
    public const ERROR_MODE_SKIP = 'SKIP';

    protected $title;
    protected $maxRetries;
    protected $errorMode;
    protected $errorMessage;
    protected $type;

    public function __construct(
        string $title,
        TypeAbstract $type,
        int $maxRetries = 1,
        string $errorMode = self::ERROR_MODE_SKIP,
        string $errorMessage = ''
    ) {
        if (!in_array(
            $errorMode,
            [
                self::ERROR_MODE_IGNORE,
                self::ERROR_MODE_REPORT_HERE,
                self::ERROR_MODE_SKIP,
            ],
            true
        )) {
            throw new RuntimeException('errorMode must be one of IGNORE or REPORT_HERE or SKIP');
        }

        $this->title = $title;
        $this->type = $type;
        $this->maxRetries = $maxRetries;
        $this->errorMode = $errorMode;
        $this->errorMessage = $errorMessage;
    }
}
