<?php

namespace Foris\Easy\Sdk\Logger\Tests;

use Foris\Easy\Logger\Logger;
use Foris\Easy\Sdk\Develop\TestCase;
use Foris\Easy\Sdk\Logger\ServiceProvider;
use Foris\Easy\Sdk\Logger\Tests\Component\NonSdkComponent;
use Foris\Easy\Sdk\Logger\Tests\Component\SdkComponent;
use Psr\Log\LoggerInterface;

/**
 * Class GetLoggerInstanceTest
 */
class GetLoggerInstanceTest extends TestCase
{
    /**
     * Gets the service providers array.
     *
     * @return array
     */
    protected function providers()
    {
        return [ServiceProvider::class];
    }

    /**
     * Test get logger instance.
     */
    public function testGetLoggerInstance()
    {
        $this->assertInstanceOf(Logger::class, $this->app()->get(LoggerInterface::class));
    }

    /**
     * Test get logger configuration.
     */
    public function testGetLoggerConfiguration()
    {
        $config = require __DIR__ . '/../src/config/logger.php';
        $this->assertEquals($config, $this->app()->get('config')->get('logger'));
    }

    /**
     * Test get logger instance from trait
     *
     * @throws \Foris\Easy\Logger\Exception\InvalidConfigException
     */
    public function testGetLoggerInstanceFromTrait()
    {
        $component = new NonSdkComponent();
        $this->assertInstanceOf(Logger::class, $component->logger());

        $this->app()->bind(SdkComponent::name(), function ($app) {
            return new SdkComponent($app);
        });
        $this->assertInstanceOf(Logger::class, $this->app()->get(SdkComponent::name())->logger());
    }
}
