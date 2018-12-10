<?php

namespace Exchanger\Out;

/**
 * Пересылаемое сообщение.
 */
interface IMessage
{
    /**
     * Идентификатор сообщения.
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Тип сообщения.
     *
     * @return IMessageType
     */
    public function getType(): IMessageType;
}