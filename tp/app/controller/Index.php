<?php
namespace app\controller;

use app\BaseController;
use app\model\User;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Config;
use think\facade\Db;

class Index extends BaseController
{
    public function index()
    {
//        $res_data=Db::connect('mysql')->name('user')
//            ->where('id',1)
//            ->find();
//        $res_data=Db::connect('mysql')->name('user')
//            ->where('id',12)
//            ->findOrFail();
        $res_data=Db::connect('mysql')->name('user')
            ->where('id',13)
            ->findOrEmpty();
        //dump($res_data);
        return json($res_data);
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }

    public function config()
    {
       return Config::get('database.connections.mysql.hostname');
   }

    public function getUser()
    {
        try {
            $user = User::select();
            return Db::getLastSql();#sql语句
        } catch (DataNotFoundException $e) {
            echo $e;
        } catch (ModelNotFoundException $e) {
            echo $e;
        } catch (DbException $e) {
            echo $e;
        }
        return json($user);
   }
}
