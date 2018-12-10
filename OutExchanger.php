<?php

namespace Exchanger;

/**
 * Модуль исходящих сообщений.
 */
abstract class OutExchanger extends Exchanger
{
    protected abstract function getQueue(): IQueue;

    protected abstract function getHandlerFactory(): IHandlerFactory;

    /**
     * Добавить сообщение в очередь на отправку.
     *
     * @param IMessage $message
     */
    public function addToQueue(IMessage $message) {
        $this->getQueue()->add($message);
    }

    /**
     * Отправить очередь.
     */
    public function send() {
        while ($message = $this->getQueue()->nextMessage()) {
            $handler = $this->getHandlerFactory()->build($message->getType());
            $envelop = $handler->fill($message->getId());
            $this->getChannel()->push($envelop);

        }
    }
}