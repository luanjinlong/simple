<?php

namespace Core\Lib\Drive\Log;

/**
 * 数据库存储日志的处理
 * Class Mysql
 * @package Core\Lib\Drive\Log
 */
class Mysql implements LogInterface
{
    public function log($name)
    {
        dd($name);
    }
}