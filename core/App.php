<?php

namespace core;

use Core\Lib\Route;

/**
 * 启动框架类 算是基类
 * Class App
 * @package core
 */
class App
{
    /**
     *  赋值的变量
     * @var array
     */
    protected $data = [];

    /**
     * 启动框架执行的方法
     */
    public static function run()
    {
        $route = new Route();
        $class = '/app/Controller/' . $route->controller;
        $class = str_replace('/', '\\', $class);
        $controller = new  $class();
        call_user_func([$controller, $route->action]);
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
            require $file;
        } else {
            //  如果累对应的文件不存在，则程序其实无法征程运行，要抛出错误
            throw new \Exception($class . '类对应的文件' . $file . '不存在');
        }
    }


    /**
     * 给模板中的变量赋值
     * @param $name
     * @param $value
     */
    public function assgin($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $file
     * @throws \Exception
     */
    public function display($file)
    {
        $file = BASE_PATH . '/app/View/' . $file;
        if (is_file($file)) {
            //  将数组打散，将键值 变成变量
            extract($this->data);
            include $file;
        } else {
            throw new \Exception($file . '试图文件不存在');
        }
    }

}