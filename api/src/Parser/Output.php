<?php

namespace App\Parser;

class Output
{
    protected $items;
    protected $storage;

    /**
     * Output constructor.
     *
     * @param $storage
     */
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * Устанавливает значение для переменной
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->items[$name] = $value;
    }

    /**
     * Добавляет значение для переменной
     * @param $name
     * @param $value
     */
    public function add($name, $value)
    {
        $this->items[$name][] = $value;
    }

    /**
     * Сохраняет значение переменной в сторадже
     * @param $name
     */
    public function save($name = null)
    {
        if ($name === null) {
            $this->storage->save($this->items);
        } else {
            $this->storage->save($this->items[$name]);
        }
    }

    public function remove($name)
    {
        unset($this->items[$name]);
    }
}
