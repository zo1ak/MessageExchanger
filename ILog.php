<?php

namespace Exchanger;

/**
 * Журнал отправленных\принятых сообщений.
 */
interface ILog
{
    public function log(IMessage $queue, IResponse $response);
}