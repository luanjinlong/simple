<?php

/**
 *  入口文件  需要做的事情
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

// 定义框架所在的根目录
define('BASE_PATH', __DIR__);
// 定义框架核心文件所在目录
define('CORE', BASE_PATH . '/core');

define('DEBUG', true);

//  引入第三方组件
include 'vendor/autoload.php';

if (DEBUG) {
    ini_set('display_errors', 'On');
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
} else {
    ini_set('display_errors', 'Off');
}

// 加载函数库
include BASE_PATH . '/core/common/function.php';
// 加载框架核心文件
include BASE_PATH . '/core/App.php';
spl_autoload_register('\core\App::load');
\core\App::run();

