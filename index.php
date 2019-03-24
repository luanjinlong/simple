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
// 项目文件所处目录
define('APP', BASE_PATH . '/app');
define('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}
// 加载函数库
include CORE . '/common/function.php';

// 加载框架核心文件
include CORE . '/App.php';
spl_autoload_register('\core\App::load');
\core\App::run();

