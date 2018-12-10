<?php

namespace Exchanger;

/**
 * Фабрика хендлеров преобразования сообщений в структуру.
 */
interface IHandlerFactory
{
    public function build(IMessageType $type): IHandler;
}