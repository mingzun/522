<?php

namespace app\api\controller;

use app\api\model\Category as CategoryModel;

/**
 * 商品分类控制器
 * Class Goods
 * @package app\api\controller
 */
class Category extends Controller
{
    /**
     * 全部分类
     * @return array
     */
    public function lists($option)
    {
        $list = array_values(CategoryModel::getCacheTree1($option));
        return $this->renderSuccess(compact('list'));
    }
}
