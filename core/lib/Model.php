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
        $dns = 'mysql:host=localhost;dbname=test';
        $username = 'root';
        $password = '666666';
        try {
            parent::__construct($dns, $username, $password);
        } catch (\PDOException $exception) {
            dd($exception->getMessage());
        }
    }

}