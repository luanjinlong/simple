<?php

namespace Core\Lib\Drive\Log;

use Core\Lib\Config;

/**
 * 文件存储日志的处理
 * Class File
 * @package Core\Lib\Drive\Log
 */
class File implements LogInterface
{

    /**
     * 日志存储位置
     * @var string
     */
    protected $path;

    public function __construct()
    {
        $this->path = Config::get('log', 'file');
    }

    public function log($message, $file = 'log')
    {
        /**
         * 1.确定文件存储位置是否存在
         * 2.写入日志
         */
        $date = date('Ymd');
        $path = $this->path . '/' . $date;
        if (!is_dir($path)) {
//            chmod($path,'0777');
            mkdir($path, '0777', true);
//            exec('chmod -R 777 '.$path);
        }
        $message = $message . date('Y-m-d H:i:s');
        $file = $path . '/' . $file;
//        dd($file);
        file_put_contents($file, json_encode($message,JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);
    }
}
