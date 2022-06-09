<?php
/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE for license details.
 */

namespace Vaimo\StdoutJsonLogger\Model;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class StdoutJsonHandler extends StreamHandler implements HandlerInterface
{
    const STREAM = 'php://stdout';

    public function __construct(
        JsonFormatter $jsonFormatter,
        $stream = self::STREAM,
        $level = Logger::DEBUG,
        $bubble = true,
        $filePermission = null,
        $useLocking = false
    ) {
        $this->setFormatter($jsonFormatter);

        /*
         * Changed stream to variable with different name
         * because \Magento\Framework\Code\Reader\ArgumentsReader is not parsing 'resource' PHPDOC parameter type
         * correctly during setup:di:compile and expects $stream to be instance of
         * non-existing class 'Monolog\Handler\resource'
         */
        $streamDifferentName = $stream;
        parent::__construct($streamDifferentName, $level, $bubble, $filePermission, $useLocking);
    }
}
