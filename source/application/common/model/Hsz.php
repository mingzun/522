<?php

namespace app\common\model;
use think\Db;
use think\Request;
/**
 * 回收站
 * Class GoodsSpec
 * @package app\common\model
 */
class Hsz extends BaseModel
{
    protected $name = 'hsz';
    public function getBestList()
    {
        return $this
        ->with([ 'image.file'])
        ->select();
    }
    public function fenlei($category_id){
        $a = new Hsz; 
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

        Db::startTrans();
        try {

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
        print_r($tableName);
        $list = $this->with(['category', 'image.file','user'])
            ->paginate(15, false, [
                'query' => Request::instance()->request()
            ]);
        // print_r($list);
        return $list;
    }
        public function category()
    {
        return $this->belongsTo('Hsz_category');
    }
      public function user()
    {
        return $this->belongsTo('user');
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
