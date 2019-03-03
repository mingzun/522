<?php

namespace app\api\controller;

use app\api\model\User as UserModel;
use think\Db;
/**
 * 用户管理
 * Class User
 * @package app\api
 */
class User extends Controller
{
    /**
     * 用户自动登录
     * @return array
     * @throws \app\common\exception\BaseException
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function login()
    {
        $model = new UserModel;
        $user_id = $model->login($this->request->post());
        $token = $model->getToken();
        return $this->renderSuccess(compact('user_id', 'token'));
    }
    public function jifen($res){
        $model = new UserModel;
        $re = $model->jifen1($res);
    if ($re){
            $user = Db('user')->where('user_id','=',$res)->find();
            $qiandaocishu = $user['qiandaocishu'];
            return $this->renderSuccess(compact('qiandaocishu'));
             }
             else {
                return $this->renderError('您今天已经签到了');
             }
    }

}
