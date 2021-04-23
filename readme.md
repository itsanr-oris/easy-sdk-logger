## 简介

Easy sdk 日志扩展组件包

[![Latest Stable Version](https://poser.pugx.org/f-oris/easy-sdk-logger/v)](//packagist.org/packages/f-oris/easy-sdk-logger) [![Total Downloads](https://poser.pugx.org/f-oris/easy-sdk-logger/downloads)](//packagist.org/packages/f-oris/easy-sdk-logger) [![Latest Unstable Version](https://poser.pugx.org/f-oris/easy-sdk-logger/v/unstable)](//packagist.org/packages/f-oris/easy-sdk-logger) [![License](https://poser.pugx.org/f-oris/easy-sdk-logger/license)](//packagist.org/packages/f-oris/easy-sdk-logger)

## 2.0版本说明

- [x] 移除php-7.0语法，兼容php-5.5语法
- [x] 组件名称改为`\Psr\Log\LoggerInterface::class`，弃用原硬编码使用的`logger`名称

## 安装

通过composer引入扩展包

```bash
composer require f-oris/easy-sdk-logger:^2.0
```

Publish日志配置信息

```bash
php artisan vendor:publish --provider="Foris\Easy\Sdk\Logger\ServiceProvider"
```

## 使用

通过服务容器，获取Logger实例，按照[easy-logger](https://github.com/itsanr-oris/easy-logger)使用说明进行调用即可

```php
<?php

$app = new \Foris\Easy\Sdk\Application();
$app->get(\Psr\Log\LoggerInterface::class)->debug('debug info');

```

## License

MIT License

Copyright (c) 2019-present F.oris <us@f-oris.me>

