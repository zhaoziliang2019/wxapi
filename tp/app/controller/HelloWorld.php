<?php

namespace app\controller;

use app\BaseController;
use app\Request;

class HelloWorld extends BaseController
{
    public function index()
    {
        return 'hellowrold,当前方法：'.$this->request->action().'当前路径：'.$this->app->getAppPath();
    }

    public function arrayoutput()
    {
        $data=array(['a'=>1,'b'=>2,'c'=>3]);
        halt("中断");
        return json($data);
    }
}