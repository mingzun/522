<?php

namespace app\common\model;
use think\Db;
use think\Request;
use app\common\model\LbzxComment as lbzxcommentModel ;


/**
 * 鲁班在线
 * Class GoodsSpec
 * @package app\common\model
 */
class Lbzx extends BaseModel
{
    protected $name = 'lbzx';
    public function getBestList()
    {
        return $this->with(['image.file','comment'])->select();
    }
    public function getBestListxq($id)
    {
        return $this->with(['image.file','comment'])->where('lbzx_id','=',$id)->find();
    }
    public function comment(){
        return $this->hasMany('lbzx_comment','lbzx_id');
    }
     public function fenlei($category_id){
    	$a = new Lbzx; 
        if ($category_id == '1') {
            return  $a->with([ 'image.file'])->select();
        }
        return  $a->with([ 'image.file'])->where('category_id','=',$category_id)->select();
    }
    
public function add(array $data)
    {

        if (!isset($data['images']) || empty($data['images'])) {
            $this->error = '请上传商品图片';
            return false;
        }

        $data['content'] = isset($data['content']) ? $data['content'] : '';
        $data['wxapp_id'] = $data['spec']['wxapp_id'] = self::$wxapp_id;

        // 开启事务
        Db::startTrans();
        try {
            // 添加商品
            $this->allowField(true)->save($data);

            $this->addGoodsImages($data['images']);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
        }
        return false;
    }
    private function addGoodsImages($images)
    {
        $this->image()->delete();
        $data = array_map(function ($image_id) {
            return [
                'image_id' => $image_id,
                'wxapp_id' => self::$wxapp_id
            ];
        }, $images);
        return $this->image()->saveAll($data);
    }
        public function image()
    {
        return $this->hasMany('GoodsImage')->order(['id' => 'asc']);
    }
    public function getList()
    {
        // 商品表名称
        $tableName = $this->getTable();
        $list = $this->with(['category', 'image.file'])
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        return $list;
    }
        public function category()
    {
        return $this->belongsTo('Lbzx_category');
    }
    public function removefw()
    {
        // 开启事务处理
        Db::startTrans();
        try {
            
            // 删除商品图片
            $this->image()->delete();
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
        public static function detail($lbzx_id)
    {
        
        //根据goods_id获得对象数组并把结果返回调用处
        return self::get($lbzx_id, ['category', 'image.file']);

    }
    public function edit($data)
    {
        if (!isset($data['images']) || empty($data['images'])) {
            $this->error = '请上传商品图片';
            return false;
        }
        $data['content'] = isset($data['content']) ? $data['content'] : '';
        $data['wxapp_id'] = $data['spec']['wxapp_id'] = self::$wxapp_id;
        // 开启事务
        Db::startTrans();
        try {
            // 保存商品
            $this->allowField(true)->save($data);
            // 商品图片
            $this->addGoodsImages($data['images']);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            $this->error = $e->getMessage();
            return false;
        }
    }


}

