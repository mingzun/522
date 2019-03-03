<?php

namespace app\store\controller;
use app\common\model\Jjg as JjgModel;
use app\common\model\Imagebanner as ImagebannerModel;
class Jjg extends Controller
{
	public function image(){
        $Jjg = '1004';
        $model = ImagebannerModel::detail($Jjg);
        if ($this->request->isAjax()) {
            $model = ImagebannerModel::detail($Jjg);
        if ($model->edit($this->postData('goods'))) {
            return $this->renderSuccess('更新成功', url('Jjg/image'));
        
        }else{
            return $this->renderError('轮播图不能为空');

        }}
         return $this->fetch('image', compact('model'));  
  }
}