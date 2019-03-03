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
class Vipjifen extends BaseModel
{
    protected $name = 'vipjifen';
 public static function getAll()
    {
        $model = new static;
        return $model->select();
    }
 }