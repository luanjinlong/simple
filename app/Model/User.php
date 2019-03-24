<?php

namespace App\Model;

use Core\Lib\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    protected $table = 'users';

    public function lists()
    {
        return $this->select($this->table, '*');
    }
}