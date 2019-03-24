<?php

namespace Core\Lib;

/**
 * 路由类
 * Class Route
 * @package Core\Lib
 */
class Route
{
    /**
     * @var string  控制器名
     */
    public $controller = 'indexController';

    /**
     * @var string  方法名
     */
    public $action = 'index';

    /**
     *  xx.com/index.php/index/index
     * 1.隐藏 index.php
     * 2.获取URL 参数部分
     * 3.返回 url 参数部分
     * Route constructor.
     */
    public function __construct()
    {
        // $_SERVER['REQUEST_URI'] 这个值其实是一定会出现的，如果 url 只有站点，则显示 '/',代表访问首页
        if (in_array($_SERVER['REQUEST_URI'], ['/', '/index.php'])) {
            return true;
        }
        //  如果不在 ['/', '/index.php']，则代表肯定有值
//            dd(explode('/', trim($_SERVER['REQUEST_URI'], '/')));
        $arr = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        if (isset($arr[0])) {
            $this->controller = $arr[0] . 'Controller';
        }
        unset($arr[0]);
        if (isset($arr[1])) {
            $this->action = $arr[1];
        }
        unset($arr[1]);
        // url 多余部分转换成 get 参数  index/index/id/1
        // 重新获取控制器和方法以外的参数，奇数是值，奇数加1是键，
        $i = 2;
        while (isset($arr[$i])) {
            if (!isset($arr[$i + 1])) {
                //  不存在这个键，则肯定到此为止了
                $get_values[$arr[$i]] = '';
                break;
            }
            $_GET[$arr[$i]] = $arr[$i + 1];
            $i = $i + 2;
        }
    }
}