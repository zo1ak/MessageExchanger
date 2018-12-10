<?php

namespace Exchanger;

/**
 * Очередь исходящих сообщений.
 */
interface IQueue extends \Iterator
{
    public function add(IMessage $message);

    public function getMessage(): IMessage;
}