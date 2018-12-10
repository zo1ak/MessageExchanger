<?php

namespace Exchanger;

/**
 * Канал передачи сообщений.
 */
interface IChannel
{
    public function push(IChannelMessage $message): IResponse;
}