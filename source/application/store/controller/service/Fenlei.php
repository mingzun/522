<?php

namespace app\store\controller\service;

use app\store\controller\Controller;
use app\store\model\Fenlei as FenleiModel;
use think\Db;

/**
 * 商品标签
 * Class Label
 * @package app\store\controller\goods
 */
class Fenlei extends Controller
{
    /**
     * 服务分类列表
     * @return mixed
     */
    public function index()
    {

        $list=Db::name('service_label')->order('sort aes')->select();
       /* dump();exit;*/
        return $this->fetch('index', compact('list'));
    }
    /**
     * 添加服务分类
     * @return array|mixed
     */
    public function add()
    {
        $model = new FenleiModel;
        if (!$this->request->isAjax()) {
            // 获取所有商品标签
            return $this->fetch('add', compact('list'));
        }
        // 新增记录
        if ($model->add($this->postData('label'))) {
            return $this->renderSuccess('添加成功', url('service.label/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }
}
