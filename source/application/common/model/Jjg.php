<?php

namespace app\common\model;

use think\Request;

/**
 * 商品模型
 * Class Goods
 * @package app\common\model
 */
class Jjg extends BaseModel
{
    protected $name = 'goods';
    protected $append = ['goods_sales'];

}
