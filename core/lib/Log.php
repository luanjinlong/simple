<?php

namespace Core\Lib;


/**
 * 1.确定日志的存储方式
 * 2.写日志
 * Class Log
 * @package Core\Lib
 */
class Log
{

    /**
     * @var LogInterface 日志处理类
     */
    protected $class;

    public function __construct()
    {
        if (!$this->class) {
            $drive = Config::get('log', 'drive');
            $class = '\Core\lib\drive\log\\' . $drive;
            $this->class = new $class();
        }
    }

    public function log($name)
    {
        $this->class->log($name);
    }
}
