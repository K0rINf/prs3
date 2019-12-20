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
    public function __construct()
//    public function __construct(Storage $storage)
    {
//        $this->storage = $storage;
    }

    public function get(string $name)
    {
        return $this->items[$name];
    }

    /**
     * Устанавливает значение для переменной
     * @param $name
     * @param $value
     */
    public function set(string $name, $value)
    {
        $this->items[$name] = $value;
    }

    /**
     * Добавляет значение для переменной
     * @param $name
     * @param $value
     */
    public function add(string $name, $value)
    {
        $this->items[$name][] = $value;
    }

    /**
     * Сохраняет значение переменной в сторадже
     * @param $name
     */
    public function save(?string $name = null)
    {
        if ($name === null) {
            $this->storage->save($this->items);
        } else {
            $this->storage->save($this->items[$name]);
        }
    }

    public function remove(string $name)
    {
        unset($this->items[$name]);
    }

    public function getAll()
    {
        return $this->items;
    }
}
