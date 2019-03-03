<?php

namespace app\store\controller;
use app\common\model\Tcmarket as TcscModel;
use app\common\model\Imagebanner as ImagebannerModel;
use app\common\model\TcscCategory as TcscCategoryModel;
use think\Db;


class Tcsc extends Controller
{
	public function index(){
		$model = new TcscModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
	}
	public function delete($id)
    {   
    	$model = TcscModel::get($id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
        
    }
    public function image(){
        $lbzx_id = '1002';
        $model = ImagebannerModel::detail($lbzx_id);

        if ($this->request->isAjax()) {
            $model = ImagebannerModel::detail($lbzx_id);
        if ($model->edit($this->postData('goods'))) {
            return $this->renderSuccess('更新成功', url('Tcsc/image'));
        
        }else{
            return $this->renderError('轮播图不能为空');

        }}
         return $this->fetch('image', compact('model'));  
  }
    public function class1(){
         $model = new TcscCategoryModel;
        $list = $model->getCacheAll();
        // print_r($list);
        // exit;
        return $this->fetch('class', compact('list'));
    }
    public function edit($category_id)
    {
        // 模板详情
        $model = TcscCategoryModel::get($category_id, ['image']);
       /* var_dump($model);exit;*/
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
          /*  var_dump($list);exit;*/
                  print_r($list);
            return $this->fetch('edit', compact('model', 'list'));
        }
        // 更新记录
        if ($model->edit($this->postData('category'))) {
            return $this->renderSuccess('更新成功', url('lbzx/class'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
    public function deleteCate($category_id)
    {
        $model = TcscCategoryModel::get($category_id);
        if ($category_id == '1') {
            return $this->renderError('不能删除全部分类');
        }
        if (!$model->remove($category_id)) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }
    public function tcscaddclass(){
         $model = new TcscCategoryModel;
        if ($this->request->isAjax()) {
          if ($model->add($this->postData('category'))) {
            return $this->renderSuccess('添加成功', url('tcsc/class1'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
        }
        return $this->fetch('tcscaddclass', compact('list'));
    }
}