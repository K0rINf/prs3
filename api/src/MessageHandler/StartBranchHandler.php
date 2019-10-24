<?php

namespace App\MessageHandler;

use App\Message\BranchMessage;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class StartBranchHandler implements MessageHandlerInterface
{
    public function __invoke(BranchMessage $message)
    {
        // отправляю
        dump($message);
    }
}
