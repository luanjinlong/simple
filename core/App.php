<?php

namespace core;

/**
 * 启动框架类
 * Class App
 * @package core
 */
class App
{

    /**
     * 启动框架执行的方法
     */
    public static function run()
    {
        echo 'ok';
        $route = new Route();
    }

    /**
     * 自动加载类对应的文件
     * @param $class
     * @throws \Exception
     */
    public static function load($class)
    {
        $file = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
        if (is_file($file)) {
            include $file;
        } else {
            throw new \Exception($class . '类对应的文件' . $file . '不存在');
        }
    }

}