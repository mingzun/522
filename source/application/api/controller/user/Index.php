<?php

namespace app\api\controller\user;

use app\api\controller\Controller;
use app\api\model\Order as OrderModel;
use app\api\model\Vipjifen as VipjifenModel;

/**
 * 个人中心主页
 * Class Index
 * @package app\api\controller\user
 */
class Index extends Controller
{
    /**
     * 获取当前用户信息
     * @return array
     * @throws \app\common\exception\BaseException
     * @throws \think\exception\DbException
     */
    public function detail()
    {
        // 当前用户信息
        $userInfo = $this->getUser();
        // 订单总数
        $model = new OrderModel;
        $orderCount = [
            'payment' => $model->getCount($userInfo['user_id'], 'payment'),
            'received' => $model->getCount($userInfo['user_id'], 'received'),
        ];
        $vip =new VipjifenModel;
        $arr = $vip->where('jifen_start','<',$userInfo['score'])->order('vipid DESC')->find();
        if ($arr) {
           $userInfo['vipjifen'] = $arr;
        }else{
           $userInfo['vipjifen'] = 'no';
        }

        return $this->renderSuccess(compact('userInfo', 'orderCount'));
    }

}
