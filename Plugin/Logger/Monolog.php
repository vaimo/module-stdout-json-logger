<?php
/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE_VAIMO.txt for license details.
 */

namespace Vaimo\StdoutJsonLogger\Plugin\Logger;

use Magento\Framework\Logger\Monolog as Subject;
use Vaimo\StdoutJsonLogger\Model\LoggerHandlerSorter;

class Monolog
{
    private LoggerHandlerSorter $handlerSorter;

    public function __construct(
        LoggerHandlerSorter $handlerSorter
    ) {
        $this->handlerSorter = $handlerSorter;
    }

    /**
     * @param Subject $subject
     * @param mixed $level
     * @param mixed $message
     * @param array $context
     * @return array
     */
    public function beforeAddRecord(Subject $subject, $level, $message, array $context): array
    {
        $handlers = $this->handlerSorter->execute(
            $subject->getHandlers() ?? []
        );
        $subject->setHandlers($handlers);

        return [$level, $message, $context];
    }
}
