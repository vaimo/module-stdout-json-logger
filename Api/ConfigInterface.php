<?php
/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE for license details.
 */

namespace Vaimo\StdoutJsonLogger\Api;

interface ConfigInterface
{
    public const PATH_OUTPUT_DISABLED = 'dev/debug/stdout_json_logger_output_disabled';

    /**
     * Is stdout output disabled?
     *
     * @return bool
     */
    public function isOutputDisabled();
}
