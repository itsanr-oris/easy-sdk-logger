<?php

namespace Foris\Easy\Sdk\Logger\Tests;

use Foris\Easy\Logger\Logger;
use Foris\Easy\Sdk\Develop\TestCase;
use Foris\Easy\Sdk\Logger\ServiceProvider;
use Foris\Easy\Sdk\Logger\Tests\Component\NonSdkComponent;
use Foris\Easy\Sdk\Logger\Tests\Component\SdkComponent;

/**
 * Class GetLoggerInstanceTest
 */
class GetLoggerInstanceTest extends TestCase
{
    /**
     * Set up test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->app()->registerProviders([ServiceProvider::class]);
    }

    /**
     * Test get logger instance.
     */
    public function testGetLoggerInstance()
    {
        $this->assertInstanceOf(Logger::class, $this->app()->get('logger'));
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
