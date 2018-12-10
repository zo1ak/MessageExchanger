<?php

namespace Exchanger\Out;

/**
 * Модуль исходящих сообщений.
 */
abstract class Sender
{
    /**
     * @return IQueue
     */
    protected abstract function getQueue(): IQueue;

    /**
     * @return IHandlerFactory
     */
    protected abstract function getHandlerFactory(): IHandlerFactory;

    /**
     * @return IChannel
     */
    protected abstract function getChannel(): IChannel;

    /**
     * @return ILog
     */
    protected abstract function getLog(): ILog;

    /**
     * Добавить сообщение в очередь на отправку.
     *
     * @param IMessage $message
     * @return Sender
     */
    public function add(IMessage $message): self
    {
        $this->getQueue()->add($message);
        return $this;
    }

    /**
     * Отправить сообщения из очереди по каналу.
     */
    public function send(): void
    {
        while ($queueItem = $this->getQueue()) {
            // Получаем сообщение из очереди.
            $message = $queueItem->getMessage();
            // Получаем хендлер по типу сообщения.
            $handler = $this->getHandlerFactory()->build($message->getType());
            // Наполняем пакет для отправки.
            $envelop = $handler->fill($message->getId());
            // Отправляем пакет по каналу.
            $response = $this->getChannel()->request($envelop);
            // Записываем в журнал результаты.
            $this->getLog()->log($message, $response);
        }
    }
}