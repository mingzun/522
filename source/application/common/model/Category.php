<?php

namespace app\common\model;

use think\Cache;

/**
 * 商品分类模型
 * Class Category
 * @package app\common\model
 */
class Category extends BaseModel
{
    protected $name = 'category';

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
        if (!Cache::get('category_' . $model::$wxapp_id)) {
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
            Cache::set('category_' . $model::$wxapp_id, compact('all', 'tree'));
        }
        return Cache::get('category_' . $model::$wxapp_id);
    }

    public static function getTree($option = 0,$num = 0,$target = []) {
        $model = new static;
        $indentStr = str_repeat('--', $num);
        $num++;
        $cs = $model->with(['image'])->where('parent_id','=',$option)->order(['sort' => 'asc'])->select();
        foreach ($cs as$key=>$c) {
                $target[$c->category_id]= $c->toArray();
                $target[$c->category_id]['name'] =$indentStr.$target[$c->category_id]['name'];
                $target =self::getTree($c->category_id,$num,$target);
        }
        return $target;
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
    public static function getWXCacheTree(){
        return self::getTree();
    }
     public static function getCacheTree1($option){
        $a1 = self::getTree1($option);
        $all = [] ;
        foreach($a1 as $k=>$v){
            $all[$k] = $v ;
            $all[$k]['child'] = self::getTree1($v['category_id']);
        }
        return $all;

    }
     public static function getTree1($option) {
        $model = new static;
        //var_dump(Cache::get('category_' . $model::$wxapp_id));exit;
            $data = $model->with(['image'])->where('parent_id','=',$option)->order(['sort' => 'asc'])->select();
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
            //Cache::set('category_' . $model::$wxapp_id, compact('all', 'tree'));
        }
        return $all;
    }

    
}
