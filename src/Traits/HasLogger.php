<?php

namespace Foris\Easy\Sdk\Logger\Traits;

use Foris\Easy\Logger\Driver\Factory;
use Foris\Easy\Logger\Logger;
use Foris\Easy\Sdk\ServiceContainer;
use Psr\Log\LoggerInterface;

/**
 * Trait HasLogger
 */
trait HasLogger
{
    /**
     * Get logger instance
     *
     * @return Logger
     * @throws \Foris\Easy\Logger\Exception\InvalidConfigException
     */
    public function logger()
    {
        if (method_exists($this, 'app')) {
            $app = $this->app();
            if (!empty($app) && $app instanceof ServiceContainer && $app->has(LoggerInterface::class)) {
                return $app->get(LoggerInterface::class);
            }
        }

        return new Logger(new Factory());
    }
}
