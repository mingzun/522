<?php

namespace app\common\model;
use think\Request;
use think\Db;


/**
 * 跳槽市场
 * Class GoodsSpec
 * @package app\common\model
 */
class Tcmarket extends BaseModel
{
    protected $name = 'tcmarket';
    public function getBestList()
    {   
        $a = $this->select();
        foreach ($a as $key => $value) {
            $value['thum'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['thum'];
            if ($value['picture1'] != '0') {
                $value['picture1'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture1']);
            }
            if ($value['picture2'] != '0') {
                $value['picture2'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture2']);
            }
            if ($value['picture3'] != '0') {
                $value['picture3'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture3']);
            }
            if ($value['picture4'] != '0') {
                $value['picture4'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture4']);
            }
            if ($value['picture5'] != '0') {
                 $value['picture5'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture5']);
            }
            if ($value['picture6'] != '0') {
                $value['picture6'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture6']);
            }
            if ($value['picture7'] != '0') {
                $value['picture7'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture7']);
            }
            if ($value['picture8'] != '0') {
                $value['picture8'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture8']);
            }
            if ($value['picture9'] != '0') {
                $value['picture9'] = explode(',','http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture9']);
            }
           

        }

        return $a;
    }
    public function fenlei($category_id){
    	return $this->where('category_id','eq',$category_id)->select();
    }
    public function getList()
    {

        $list = $this
            ->with(['category','uid'])
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
        public function category()
    {
        return $this->belongsTo('Category');
    }
            public function uid()
    {
        return $this->belongsTo('user');
    }
    public function remove(){
        // 开启事务处理
        Db::startTrans();
        try {
            
            // 删除当前商品
            $this->delete();
            // 事务提交
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
            return false;
        }
    }
    public function fenleitc($category_id){
        $a = new Tcmarket; 
        if ($category_id == '1') {
            return  $a->select();
        }
        return  $a->where('category_id','=',$category_id)->select();
    }
    public function image()
    {
        return $this->hasMany('GoodsImage')->order(['id' => 'asc']);
    }

}
