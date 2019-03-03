<?php

namespace app\store\controller;
use app\common\model\Lbzx as LbzxModel;
use think\Db;
use app\common\model\Imagebanner as ImagebannerModel;
use app\common\model\LbzxCategory as LbzxCategoryModel;

class Lbzx extends Controller
{
	public function list1(){
		 $model = new LbzxModel;
        $list = $model->getList();
        /*dump($list);die;*/
        // echo "<pre>";

        // print_r($list);
        return $this->fetch('list', compact('list'));
	}
	public function index(){
		if ($this->request->isAjax()) {
					$model = new LbzxModel;
	        if ($model->add($this->postData('goods'))) {
	            return $this->renderSuccess('添加成功', url('Lbzx/list1'));
	        }
	        $error = $model->getError() ?: '添加失败';
	        return $this->renderError($error);
		}
		$catgory = LbzxCategoryModel::getCacheTree();
		return $this->fetch('index', compact('catgory'));
	}
	public function class1(){
         $model = new LbzxCategoryModel;
        $list = $model->getCacheAll();
        // print_r($list);
        // exit;
		return $this->fetch('class', compact('list'));
	}
	public function lbzxaddclass(){
         $model = new LbzxCategoryModel;
		if ($this->request->isAjax()) {
          if ($model->add($this->postData('category'))) {
            return $this->renderSuccess('添加成功', url('Lbzx/class1'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
        }
		return $this->fetch('lbzxaddclass', compact('list'));
	}
	public function delete($category_id)
    {
        $model = LbzxCategoryModel::get($category_id);
        if ($category_id == '1') {
            return $this->renderError('不能删除全部分类');
        }
        if (!$model->remove($category_id)) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }
    public function edit($category_id)
    {
        // 模板详情
        $model = LbzxCategoryModel::get($category_id, ['image']);
       /* var_dump($model);exit;*/
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
          /*  var_dump($list);exit;*/
            return $this->fetch('edit', compact('model', 'list1'));
        }
        // 更新记录
        if ($model->edit($this->postData('category'))) {
            return $this->renderSuccess('更新成功', url('lbzx/class1'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
        public function deletefw($goods_id)
    {
        $model = LbzxModel::get($goods_id);
        if (!$model->removefw()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }
    public function lalalaedit($lbzx_id){
        $model = LbzxModel::detail($lbzx_id);
        if ($this->request->isAjax()) {
		 $model = LbzxModel::detail($lbzx_id);
        	        // 更新记录
        if ($model->edit($this->postData('goods'))) {
            return $this->renderSuccess('更新成功', url('lbzx/list1'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
        }
    	$catgory = LbzxCategoryModel::getCacheTree();//返回数组
        return $this->fetch('lalalaedit', compact('model', 'catgory'));
    }
    public function image(){
        $lbzx_id = '1001';
        $model = ImagebannerModel::detail($lbzx_id);

        if ($this->request->isAjax()) {
            $model = ImagebannerModel::detail($lbzx_id);
        if ($model->edit($this->postData('goods'))) {
            return $this->renderSuccess('更新成功', url('lbzx/image'));
        
        }else{
            return $this->renderError('轮播图不能为空');

        }}
         return $this->fetch('image', compact('model'));  
  }
}