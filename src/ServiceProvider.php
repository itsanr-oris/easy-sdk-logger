<?php

namespace Foris\Easy\Sdk\Logger;

use Foris\Easy\Logger\Driver\Factory;
use Foris\Easy\Logger\Logger;
use Psr\Log\LoggerInterface;

/**
 * Class ServiceProvider
 */
class ServiceProvider extends \Foris\Easy\Sdk\ServiceProvider
{
    /**
     * Register logger component
     *
     * @throws \ReflectionException
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/logger.php', 'logger');

        $this->publishes([
            __DIR__ . '/config/logger.php' => $this->app()->getConfigPath('logger.php')
        ]);

        $this->app()->singleton(Factory::class, function () {
            return new Factory();
        });

        $this->app()->singleton(LoggerInterface::class, function () {
            return new Logger($this->app()->get(Factory::class), $this->app()->get('config')->get('logger'));
        });
    }
}
