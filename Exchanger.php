<?php

namespace Exchanger;

/**
 * Базовый модуль обмена сообщений.
 */
abstract class Exchanger {

    /**
     * @return IChannel
     */
    protected abstract function getChannel(): IChannel;

    /**
     * @return ILog
     */
    protected abstract function getLog(): ILog;
}