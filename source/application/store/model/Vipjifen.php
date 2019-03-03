<?php

namespace app\store\model;
use think\Db;
use think\Request;
use app\common\model\Vipjifen as VipjifenModel;


/**
 * 鲁班在线
 * Class GoodsSpec
 * @package app\common\model
 */
class Vipjifen extends VipjifenModel
{
    protected $name = 'vipjifen';
 public static function getAll()
    {
        $model = new static;
        return $model->select();
    }
 }