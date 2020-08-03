## 简介

Easy sdk 日志扩展组件包

[![Latest Stable Version](https://poser.pugx.org/f-oris/easy-sdk-logger/v)](//packagist.org/packages/f-oris/easy-sdk-logger) [![Total Downloads](https://poser.pugx.org/f-oris/easy-sdk-logger/downloads)](//packagist.org/packages/f-oris/easy-sdk-logger) [![Latest Unstable Version](https://poser.pugx.org/f-oris/easy-sdk-logger/v/unstable)](//packagist.org/packages/f-oris/easy-sdk-logger) [![License](https://poser.pugx.org/f-oris/easy-sdk-logger/license)](//packagist.org/packages/f-oris/easy-sdk-logger)

## 安装

通过composer引入扩展包

```bash
composer require f-oris/easy-sdk-logger
```

Publish日志配置信息

```bash
php artisan vendor:publish --provider="Foris\Easy\Sdk\Logger\ServiceProvider"
```

## 使用

通过服务容器，获取Logger实例，按照Logger使用说明进行调用即可

```php
<?php

$app = new \Foris\Easy\Sdk\Application();
$app->get('logger')->debug('debug info');

```

## License

MIT License

Copyright (c) 2019-present F.oris <us@f-oris.me>

