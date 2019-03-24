<?php

namespace Core\Lib;

use Medoo\Medoo;

/**
 * Model 类链接PDO
 * Class Model
 * @package Core\Lib
 */
class Model extends Medoo
{
    /**
     * Model constructor.
     */
    public function __construct()
    {
        $option = Config::get('database');
        parent::__construct($option);
    }

}