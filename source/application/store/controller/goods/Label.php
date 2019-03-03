<?php

namespace app\store\controller\goods;

use app\store\controller\Controller;
use app\store\model\Label as LabelModel;
use think\Db;

/**
 * 商品标签
 * Class Label
 * @package app\store\controller\goods
 */
class Label extends Controller
{
    /**
     * 商品标签列表
     * @return mixed
     */
    public function index()
    {
        $list=Db::name('label')->order('good_id aes')->select();
        return $this->fetch('index', compact('list'));
    }

  /**
     * 删除商品标签
     * @param $goods_label_id
     * @return array
     * @throws \think\exception\DbException
     */
    public function delete($goods_label_id)
    {
        $res=Db::name('label')->where('goods_label_id',$goods_label_id)->delete();
        if ($res==0) {
            return $this->renderError('删除失败');
        }else{
            return $this->renderSuccess('删除成功');
        } 
    }

   /**
     * 添加商品标签
     * @return array|mixed
     */
    public function add()
    {
        $model = new LabelModel;
        if (!$this->request->isAjax()) {
            // 获取所有商品标签
            return $this->fetch('add', compact('list'));
        }
        // 新增记录
        if ($model->add($this->postData('label'))) {
            return $this->renderSuccess('添加成功', url('goods.label/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }
  
 //编辑商品标签
     public function edit($goods_label_id)
    {
        //商品标签详情
        /*echo '78788';exit;*/
        $model = LabelModel::get($goods_label_id);
        //dump($model);exit;
        if (!$this->request->isAjax()) {
            // 获取商品标签
            $list = $model->get($goods_label_id);
            /*dump($list);exit;*/
            return $this->fetch('edit', compact('list'));
        }
        // 更新记录
         /*var_dump($this->postData('label'));exit;*/
        if ($model->edit($this->postData('label'))) {
           /* echo '456789';exit;*/
            return $this->renderSuccess('更新成功', url('goods.label/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
}
