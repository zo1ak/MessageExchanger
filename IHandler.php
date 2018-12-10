<?php

namespace Exchanger;

/**
 * Хендлер для наполнения структуры.
 */
interface IHandler
{
    public function fill(int $id): IChannelMessage;
}