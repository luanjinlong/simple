<?php

namespace App\Controller;

use App\Model\User;
use App\Service\PayNet;
use Core\App;
use Core\Lib\Log;
use Core\Lib\Model;
use PDO;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends App
{

    public function index()
    {
        $model = new Model();
        $result = $model->query('select * from users limit 1');
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $this->assgin('id', $row['id']);
        $this->display('index.php');

//        $user = new User();
//        dd($user->lists());

//        $log = new Log();
//        $log->log('33');
    }

    public function test()
    {

    }
}

