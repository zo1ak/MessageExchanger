<?php

namespace Exchanger\Out;

/**
 * Журнал отправленных\принятых сообщений.
 */
interface ILog
{
    /**
     * Добавить запись в журнал об отправленном сообщении и результатах отправки.
     *
     * @param IMessage $queue
     * @param IResponse $response
     * @return mixed
     */
    public function log(IMessage $queue, IResponse $response);
}