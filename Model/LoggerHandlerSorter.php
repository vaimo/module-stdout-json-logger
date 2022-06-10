<?php
/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE for license details.
 */

namespace Vaimo\StdoutJsonLogger\Model;

class LoggerHandlerSorter
{
    const STDOUT_HANDLER_POSITION = 1;

    private bool $isApplied = false;

    /**
     * Sort Logger handlers so that stdout handler is positioned correctly
     */
    public function execute(array $handlers): array
    {
        if ($this->isApplied) {
            return $handlers;
        }

        foreach ($handlers as $key => $handler) {
            if ($key == self::STDOUT_HANDLER_POSITION || !($handler instanceof StdoutJsonHandler)) {
                continue;
            }

            unset($handlers[$key]);
            \array_splice($handlers, self::STDOUT_HANDLER_POSITION, 0, [$handler]);
            break;
        }

        $this->isApplied = true;

        return $handlers;
    }
}
