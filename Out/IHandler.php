<?php

namespace Exchanger\Out;

/**
 * Хендлер для наполнения структуры.
 */
interface IHandler
{
    public function fill(int $id): IChannelMessage;
}