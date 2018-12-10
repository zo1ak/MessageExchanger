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
    public function addToQueue(IMessage $message)
    {
        $this->getQueue()->add($message);
    }

    /**
     * Отправить сообщения из очереди по каналу.
     */
    public function send()
    {
        while ($queueItem = $this->getQueue()) {
            // Получаем сообщение из очереди.
            $message = $queueItem->getMessage();
            // Получаем хендлер по типу сообщения.
            $handler = $this->getHandlerFactory()->build($message->getType());
            // Наполняем пакет для отправки.
            $envelop = $handler->fill($message->getId());
            // Отправляем пакет по каналу.
            $response = $this->getChannel()->push($envelop);
            // Записываем в журнал результаты.
            $this->getLog()->log($message, $response);
        }
    }
}