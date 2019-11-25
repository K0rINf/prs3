<?php


namespace App\Parser\Type;


use InvalidArgumentException;

class ArgumentDefinition
{
    private $arguments;

    /**
     * Sets the ConfigArgument objects.
     *
     * @param ConfigArgument[] $arguments An array of ConfigArgument objects
     */
    public function setArguments($arguments = [])
    {
        $this->arguments = [];
        $this->addArguments($arguments);
    }

    /**
     * Adds an array of ConfigArgument objects.
     *
     * @param ConfigArgument[] $arguments An array of ConfigArgument objects
     */
    public function addArguments($arguments = [])
    {
        if (null !== $arguments) {
            foreach ($arguments as $argument) {
                $this->addArgument($argument);
            }
        }
    }

    /**
     * @param ConfigArgument $argument
     *
     * @throws LogicException When incorrect argument is given
     */
    public function addArgument(string $name, $mode = null, $description = '', $default = null)
    {
        $argument = new ConfigArgument($name, $mode, $description, $default);

        if (isset($this->arguments[$argument->getName()])) {
            throw new LogicException(sprintf('An argument with name "%s" already exists.', $argument->getName()));
        }

//        if ($this->hasAnArrayArgument) {
//            throw new LogicException('Cannot add an argument after an array argument.');
//        }

//        if ($argument->isRequired() && $this->hasOptional) {
//            throw new LogicException('Cannot add a required argument after an optional one.');
//        }

//        if ($argument->isArray()) {
//            $this->hasAnArrayArgument = true;
//        }
//
//        if ($argument->isRequired()) {
//            ++$this->requiredCount;
//        } else {
//            $this->hasOptional = true;
//        }

        $this->arguments[$argument->getName()] = $argument;
    }

    /**
     * Returns an ConfigArgument by name or by position.
     *
     * @param string|int $name The ConfigArgument name or position
     *
     * @return ConfigArgument An ConfigArgument object
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function getArgument($name)
    {
        if (!$this->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        $arguments = \is_int($name) ? array_values($this->arguments) : $this->arguments;

        return $arguments[$name];
    }

    /**
     * Returns true if an ConfigArgument object exists by name or position.
     *
     * @param string|int $name The ConfigArgument name or position
     *
     * @return bool true if the ConfigArgument object exists, false otherwise
     */
    public function hasArgument($name)
    {
        $arguments = \is_int($name) ? array_values($this->arguments) : $this->arguments;

        return isset($arguments[$name]);
    }

    /**
     * Gets the array of ConfigArgument objects.
     *
     * @return ConfigArgument[] An array of ConfigArgument objects
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Returns the number of ConfigArguments.
     *
     * @return int The number of ConfigArguments
     */
    public function getArgumentCount()
    {
        return \count($this->arguments);
    }
}
