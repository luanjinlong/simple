<?php

namespace Core\Lib;

/**
 * 获取配置的文件
 * Class Config
 * @package Core\Lib
 */
class Config
{
    private static $configs = [];

    /**
     *  获取配置文件的某个值
     * 1.判断配置文件是否存在
     * 2，判断配置是否存在
     * 3.缓存配置
     * 缓存的是文件名对应的键
     * @param $file
     * @param  $name
     * @return mixed
     * @throws \Exception
     */
    public static function get($file, $name)
    {
        if (isset(self::$configs[$file])) {
            if (!isset(self::$configs[$file][$name])) {
                throw new \Exception($file . '配置文件中的' . $name . '变量不存在');
            }
            return self::$configs[$file][$name];
        }

        $file = BASE_PATH . '/core/config/' . $file . '.php';

        if (!is_file($file)) {
            throw new \Exception($file . '配置文件不存在');
        }
        $conf = require $file;
        self::$configs[$file] = $conf;

        if (isset($conf[$name])) {
            return $conf[$name];
        }
        throw new \Exception($name . '配置项不存在');
    }
}