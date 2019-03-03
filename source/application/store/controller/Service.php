<?php

namespace app\store\controller;

use app\store\controller\Controller;
use app\store\model\Service as ServiceModel;
use think\Db;

/**
 * 商品分类
 * Class Category
 * @package app\store\controller\goods
 */
class Service extends Controller
{
    /**
     * 服务分类列表
     * @return mixed
     */
    public function index()
    {
        $list=Db::name('service_lst')->select();
       /* var_dump($list);exit;*/
        return $this->fetch('index', compact('list'));
    }



    public function add(){
         return $this->fetch('add', compact('list'));
    }

    
}
