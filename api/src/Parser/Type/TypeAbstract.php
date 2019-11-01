<?php

namespace App\Parser\Type;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use InvalidArgumentException;

abstract class TypeAbstract
{
    private $definition;
    protected $arguments = [];

    /**
     * TypeAbstract constructor.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->definition = new ArgumentDefinition();
        $this->configure();


        // @todo replace to array_filter
        foreach ($this->definition->getArguments() as $argument) {
            $value = $options[$argument->getName()];

            if (empty($value) && $argument->isRequired()) {
                throw new InvalidArgumentException('Argument '.$argument->getName().' is required');
            }

            $this->setArgument($argument->getName(), $value);
        }
    }

    /**
     * Метод должен установить аргументы конфигурации для типа
     * @return void
     */
    abstract protected function configure(): void;

    /**
     * Отработка типа
     *
     * @param Context        $context
     * @param DriverAbstract $driver
     *
     * @return mixed
     */
    abstract protected function run(Context $context, DriverAbstract $driver);

    /**
     * Adds an argument.
     *
     * @param string               $name        The argument name
     * @param int|null             $mode        The argument mode: InputArgument::REQUIRED or InputArgument::OPTIONAL
     * @param string               $description A description text
     * @param string|string[]|null $default     The default value (for InputArgument::OPTIONAL mode only)
     *
     * @return $this
     * @throws InvalidArgumentException When argument mode is not valid
     *
     */
    public function addArgument($name, $mode = null, $description = '', $default = null)
    {
        $this->definition->addArgument(new ConfigArgument($name, $mode, $description, $default));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getArgument($name)
    {
        if (!$this->definition->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        return $this->arguments[$name] ?? $this->definition->getArgument($name)->getDefault();
    }

    /**
     * {@inheritdoc}
     */
    public function setArgument($name, $value): void
    {
        if (!$this->definition->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        $this->arguments[$name] = $value;
    }

}
