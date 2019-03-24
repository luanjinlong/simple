<?php

namespace Core\Lib;

/**
 * Model 类链接PDO
 * Class Model
 * @package Core\Lib
 */
class Model extends \PDO
{
    /**
     * Model constructor.
     */
    public function __construct()
    {
        $dns = Config::get('database', 'dns');
        $username = Config::get('database', 'username');
        $password = Config::get('database', 'password');
        try {
            parent::__construct($dns, $username, $password);
        } catch (\PDOException $exception) {
            dd($exception->getMessage());
        }
    }

}