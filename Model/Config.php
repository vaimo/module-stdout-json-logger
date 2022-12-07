<?php

namespace Vaimo\StdoutJsonLogger\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Vaimo\StdoutJsonLogger\Api\ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * @param ScopeConfigInterface $config
     */
    public function __construct(
        private readonly ScopeConfigInterface $config
    ) {
    }

    /**
     * @inheritDoc
     */
    public function isOutputDisabled(): bool
    {
        return $this->config->isSetFlag(self::PATH_OUTPUT_DISABLED);
    }
}
