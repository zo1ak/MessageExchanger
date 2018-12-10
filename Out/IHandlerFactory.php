<?php

namespace Exchanger\Out;

/**
 * Фабрика хендлеров преобразования сообщений в структуру.
 */
interface IHandlerFactory
{
    /**
     * Возвращает хендлер по типу сообщения.
     *
     * @param IMessageType $type
     * @return IHandler
     */
    public function build(IMessageType $type): IHandler;
}