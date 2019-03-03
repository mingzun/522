<?php

namespace app\common\model;
use think\Db;

/**
 * 回收站
 * Class GoodsSpec
 * @package app\common\model
 */
class Imagebanner extends BaseModel
{
    protected $name = 'image_banner';
    
       public function image()
    {
        return $this->hasMany('GoodsImage')->order(['id' => 'asc']);
    }
       public static function detail($lbzx_id)
    {
        
        //根据goods_id获得对象数组并把结果返回调用处
        return self::get($lbzx_id, [ 'image.file']);

    }
     public function edit($data)
    {	
        Db::startTrans();
        try {
            // 保存商品
            // 商品图片
        $data['wxapp_id'] = $data['spec']['wxapp_id'] = self::$wxapp_id;
            $this->addGoodsImages($data['images']);
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            $this->error = $e->getMessage();
            return false;
        }
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


}