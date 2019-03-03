<?php

namespace app\common\model;
use app\common\model\Vipjifen as vipjifenModel;
use think\Request;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class User extends BaseModel
{
    protected $name = 'user';

    // 性别
    private $gender = ['未知', '男', '女'];

    /**
     * 关联收货地址表
     * @return \think\model\relation\HasMany
     */
    public function address()
    {
        return $this->hasMany('UserAddress');
    }
    /**
     * 关联收货地址表 (默认地址)
     * @return \think\model\relation\BelongsTo
     */
    public function addressDefault()
    {
        return $this->belongsTo('UserAddress', 'address_id');
    }

    /**
     * 显示性别
     * @param $value
     * @return mixed
     */
    public function getGenderAttr($value)
    {
        return $this->gender[$value];
    }

    /**
     * 获取用户列表
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList()
    {
        $request = Request::instance();
        return $this
            ->order(['create_time' => 'desc'])
            ->paginate(15, false, ['query' => $request->request()]);
    }
    public function jijifenfen(){
        $vip =new VipjifenModel;
        $arr = $vip->where('jifen_start','<',$userInfo['score'])->order('vipid DESC')->find();
    }
    /**
     * 获取用户信息
     * @param $where
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($where)
    {
        return self::get($where, ['address', 'addressDefault']);
    }
     public function jifen1($res){
        $nian =date('Y',time());
        $yue =date('m',time());
        $ri =date('d',time());
        $select = $this->where('user_id','eq',$res)->where('year',$nian)->where('month',$yue)->where('day',$ri)->find();
        if ($select) {
            return false;
        }else{
            $time=time();
            $asdasd = Db('jifen')->where('id','=','2')->find();
            $asdff = Db('user')->where('user_id','eq',$res)->find();
            $fenshu = $asdasd['socre'];
            $fenshu1 = $asdff['score'];
            $fenfen = $fenshu + $fenshu1;
            $data = ['year' => $nian, 'month' => $yue,'day'=>$ri,'signed_time'=>$time,'score' => $fenfen];
            $res = $this->where('user_id','eq',$res)
            ->inc('qiandaocishu')
            ->update($data);   
            return $res;
        }        
    }
}
