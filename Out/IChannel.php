<?php

namespace Exchanger\Out;

/**
 * Канал отправки сообщений.
 */
interface IChannel
{
    /**
     * Отправить сообщение в формате канала.
     *
     * @param IChannelMessage $message
     * @return IResponse ответ от внешнего ресурса.
     */
    public function request(IChannelMessage $message): IResponse;
}