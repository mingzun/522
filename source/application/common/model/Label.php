<?php

namespace app\common\model;

use think\Request;

/**
 * 商品模型
 * Class Goods
 * @package app\common\model
 */
class Label extends BaseModel
{
 
      public static function detail($goods_label_id)
	    {
	        return self::get($goods_label_id, ['good_label', 'good_id']);
	    }

}
