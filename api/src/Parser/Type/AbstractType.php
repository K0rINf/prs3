<?php

namespace App\Parser\Type;

use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Modifier\Modifier;
use InvalidArgumentException;


/**
 * Class AbstractType
 * @package App\Parser\Type
 *
 *          Разделить типы на типы которые могут использовать модификаторы и на типы которые не используют модификаторы
 */

abstract class AbstractType
{
    private $definition;
    protected $arguments = [];
    protected $modifier;

    /**
     * AbstractType constructor.
     *
     * @param array $options Массив с параметрами для типа
     * @param Modifier $modifier модификатор для типа
     */
    public function __construct(array $options, Modifier $modifier = null)
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

        $this->modifier = $modifier;
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
     *
     * @return mixed
     */
    abstract protected function run(Context $context);

    /**
     * Выполнение типа и приминение модификаторов к результату
     * @param Context        $context
     * @param DriverAbstract $driver
     */
    public function execute(Context $context) {
        $result = $this->run($context);
//        foreach ($this->modifiers as $modifier) {
//            $result = $modifier->run($result);
//        }
    }

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
        $this->definition->addArgument($name, $mode, $description, $default);

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

    public function getArguments()
    {
        $arReturn = [];
        $arguments = $this->definition->getArguments();
        foreach ($arguments as $argument) {
            $arReturn[$argument->getName()] = $this->getArgument($argument->getName());
        }
        return $arReturn;
    }
}

