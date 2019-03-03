<?php

namespace app\store\model;

use app\common\model\Label as LabelModel;
use think\Cache;

/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class Label extends LabelModel
{
	 public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
//        if (!empty($data['image'])) {
//            $data['image_id'] = UploadFile::getFildIdByName($data['image']);
//        }
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }

     /**
     * 删除缓存
     * @return bool
     */
    private function deleteCache()
    {
        return Cache::rm('label_' . self::$wxapp_id);
    }

    /**
     * 编辑记录
     * @param $data
     * @return bool|int
     */
    public function edit($data)
    {
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }

}
