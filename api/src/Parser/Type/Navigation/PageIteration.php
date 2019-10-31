<?php


namespace App\Parser\Type\Navigation;

use App\Parser\Branch;
use App\Parser\Context;
use App\Parser\Driver\DriverAbstract;
use App\Parser\Type\TypeAbstract;

/**
 * Тип делает запрос на страницу и помещает результат в контекст выполнения
 * Class GoToUrl
 * @package App\Parser\Type\Navigation
 */
class PageIteration extends TypeAbstract
{
    protected $config;

    public function run(Context $context, DriverAbstract $driver) {
        // вычисляем количество страниц
        // создаем ветку для каждой страницы
        $branch = new Branch($context->getInput(), $context->getOutput(), $context->getActions());
        // пушим ветку в очередь
        $message = new BranchMessage($branch);
        $this->commandBus->dispath($message);

    }
}
