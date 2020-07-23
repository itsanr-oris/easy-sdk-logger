<?php

namespace Foris\Easy\Sdk\Logger;

use Foris\Easy\Logger\Driver\Factory;
use Foris\Easy\Logger\Logger;

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

        $this->app()->singleton('logger_driver', function () {
            return new Factory();
        });

        $this->app()->singleton('logger', function () {
            return new Logger($this->app()->get('logger_driver'), $this->app()->get('config')->get('logger'));
        });
    }
}
