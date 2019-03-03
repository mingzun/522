<?php

namespace app\common\model;

use think\Cache;

/**
 * 商品分类模型
 * Class Category
 * @package app\common\model
 */
class LbzxCategory extends BaseModel
{
    protected $name = 'lbzx_category';

    /**
     * 分类图片
     * @return \think\model\relation\HasOne
     */
    public function image()
    {
        return $this->hasOne('uploadFile', 'file_id', 'image_id');
    }

    /**
     * 所有分类
     * @return mixed
     */
    public static function getALL()
    {
        $model = new static;
        //var_dump(Cache::get('category_' . $model::$wxapp_id));exit;
        if (!Cache::get('_category' . $model::$wxapp_id)) {
            $data = $model->with(['image'])->order(['sort' => 'asc'])->select();
           /* var_dump($data);exit;*/
            $all = !empty($data) ? $data->toArray() : [];
            $tree = [];
            foreach ($all as $first) {
                if ($first['parent_id'] != 0) continue;
                $twoTree = [];
                foreach ($all as $two) {
                    if ($two['parent_id'] != $first['category_id']) continue;
                    $threeTree = [];
                    foreach ($all as $three)
                        $three['parent_id'] == $two['category_id']
                        && $threeTree[$three['category_id']] = $three;
                    !empty($threeTree) && $two['child'] = $threeTree;
                    $twoTree[$two['category_id']] = $two;
                }
                if (!empty($twoTree)) {
                    array_multisort(array_column($twoTree, 'sort'), SORT_ASC, $twoTree);
                    $first['child'] = $twoTree;
                }
                $tree[$first['category_id']] = $first;
            }
            Cache::set('_category' . $model::$wxapp_id, compact('all', 'tree'));
        }
        return Cache::get('_category' . $model::$wxapp_id);
    }

    /**
     * 获取所有分类
     * @return mixed
     */
    public static function getCacheAll()
    {
        return self::getALL()['all'];
    }

    /**
     * 获取所有分类(树状结构)
     * @return mixed
     */
    public static function getCacheTree()
    {
        return self::getALL()['tree'];
    }

     public function add($data)
    {
        $data['wxapp_id'] = self::$wxapp_id;
//        if (!empty($data['image'])) {
//            $data['image_id'] = UploadFile::getFildIdByName($data['image']);
//        }
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }
    private function deleteCache()
    {
        return Cache::rm('_category' . self::$wxapp_id);
    }
    public function remove($category_id)
    {
        // 判断是否存在商品
        if ($goodsCount = (new Lbzx)->where('category_id','=',$category_id)->count()) {
            $this->error = '该分类下存在' . $goodsCount . '个商品，不允许删除';
            return false;
        }
        // 判断是否存在子分类
        if ((new self)->where(['parent_id' => $category_id])->count()) {
            $this->error = '该分类下存在子分类，请先删除';
            return false;
        }
        $this->deleteCache();
        return $this->delete();
    }
    public function edit($data)
    {
        $this->deleteCache();
        return $this->allowField(true)->save($data);
    }
     

}
