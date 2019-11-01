<?php

namespace App\Parser\Type;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class TypeAbstract
{
    protected $config;

    /**
     * TypeAbstract constructor.
     *
     * @param TypeConfigAbstract $config
     * @param ValidatorInterface $validator
     */
    public function __construct(TypeConfigAbstract $config, ValidatorInterface $validator)
    {
        // конфигурация должна быть валидной для типа
        $errors = $validator->validate($config);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;
        }

        $this->config = $config;
    }

    abstract function run(Context $context, DriverAbstract $driver);
}
