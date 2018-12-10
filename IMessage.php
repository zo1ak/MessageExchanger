<?php

namespace Exchanger;

/**
 * Пересылаемое сообщение.
 */
interface IMessage
{
    public function getId(): int;
    public function getType(): IMessageType;
}