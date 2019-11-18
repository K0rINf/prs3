<?php

namespace App\Parser;

use App\Parser\Type\AbstractType;
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
        AbstractType $type,
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

    /**
     * Выполнение Action
     * @param Context $context
     */
    public function run(Context $context) {
        $retry = 0;
        while ($retry < $this->maxRetries) {
            $retry++;

            try {
                $result = $this->type->execute($context, $driver);
            } catch (\Exception $e) {
                switch ($this->errorMode) {
                    case self::ERROR_MODE_SKIP:
                        continue 2;
                        break;
                    case self::ERROR_MODE_REPORT_HERE:
                        $context->reportError(
                            $this->title,
                            $this->errorMessage,
                            $e
                        );
                        break;
                    case self::ERROR_MODE_IGNORE:
                    default:

                        break;
                }
            }
        }
    }
}
