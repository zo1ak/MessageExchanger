<?php

namespace Exchanger\Out;

/**
 * Очередь исходящих сообщений.
 */
interface IQueue extends \Iterator
{
    /**
     * Добавить сообщение в очередь.
     *
     * @param IMessage $message
     * @return mixed
     */
    public function add(IMessage $message);

    /**
     * Получить сообщение из текущего элемента очереди.
     *
     * @return IMessage
     */
    public function getMessage(): IMessage;
}