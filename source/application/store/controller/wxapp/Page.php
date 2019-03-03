<?php

namespace app\store\controller\wxapp;

use app\store\controller\Controller;
use app\store\model\WxappPage as WxappPageModel;
use app\store\model\syfl as syflPageModel;
use app\store\model\Goods as GoodsModel;
use think\Db;
/**
 * 小程序页面管理
 * Class Page
 * @package app\store\controller\wxapp
 */
class Page extends Controller
{
    /**
     * 首页设计
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function home()
    {
        $model = WxappPageModel::detail();
        if (!$this->request->isAjax()) {
            $jsonData = $model['page_data']['json'];
            return $this->fetch('home', compact('jsonData'));
        }
        $data = $this->postData('data');
        if (!$model->edit($data)) {
            return $this->renderError('更新失败');
        }
        return $this->renderSuccess('更新成功');
    }

    /**
     * 页面链接
     * @return mixed
     */
    public function links()
    {
        return $this->fetch('links');
    }
    //首页分类
    public function syfl(){
        $obj = new SyflPageModel;
        $list = $obj->where('sufl','eq','每日新鲜')->select();
        $list1 = $obj->where('sufl','eq','天天特价')->select();
        $list2 = $obj->where('sufl','eq','生活必备')->select();
        $this->assign(['list'=>$list,'list1'=>$list1,'list2'=>$list2]);
        return $this->fetch('syfl');
    }
     public function syfl1(){
        if (request()->isPOST()) {
            $obj = new SyflPageModel;
            $data = request()->param();
            $file = request()->file('images');
            if ($file) {
            $info = $file->move(ROOT_PATH . '../web/uploads');
            if ($info) 
               $a = $info->getSaveName();
               $b = str_replace('\\','/' , $a);

           $data['images']='http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$b;
            } else {
                $this->success('请上传图片','syfl');
            }
           $re =  $obj->where('id','eq',$data['id'])->update($data);
           if ($re) {
            return $this->redirect('syfl');
           }
        }else{
            $re = request()->param();
            $obj = new SyflPageModel;
            $list = $obj->where('id','eq',$re['id'])->select();
            $this->assign('list',$list);
            return $this->fetch('syfl1');
        }
    }
    public function syfl2(){
        $re = request()->param();
        $model = new GoodsModel;
        $list = $model->getList1();
        $list1 = $model->getList2($re['id']);
        $this->assign(['list' => $list,'id' => $re['id'],'list1' => $list1]);
        return $this->fetch('syfl2');
    }
    public function syfl2ajax(){
        date_default_timezone_set('PRC');
        $data = request()->param();
        $model = new GoodsModel;
        $asd = $model->where('goods_id','eq',$data['goodsid'])->find();
        $dsa = $asd['syfl'];
        if ($dsa !== '0') {
            $re =  $model->where('goods_id','eq',$data['goodsid'])->update(['syfl'=>'0','update_time'=>time()]);
            $ree =  $model->getList3($data['goodsid']);
            $da["success"] = 'NO';
            $da["data"] = $data['goodsid'];
            $da["res"] =$ree;
           return $da;
        }
        if ($dsa == '0') {
            $re =  $model->where('goods_id','eq',$data['goodsid'])->update(['syfl'=>$data['id'],'update_time'=>time()]);
            $ree =  $model->getList3($data['goodsid']);
            $da["success"] = 'ok';
            $da["data"] = $data['goodsid'];
            $da["res"] =$ree;
           return $da;
        }
    }
    public function vip(){
        $list = Db('vipjifen')->select();
        return $this->fetch('vip', compact('list'));
    }
    public function vipadd(){
        if ($this->request->isAjax()) {
          if ($this->vvippadd($this->postData('category'))) {
            return $this->renderSuccess('添加成功', url('Wxapp.page/vip'));
        }
    }
        return $this->fetch();
    }
        public function vvippadd(array $data)
    {
        $a = Db('vipjifen')->order('vipid')->find();
        if ($data['jifen_start'] <= $a['jifen_end'] || $data['jifen_end'] <= $a['jifen_end'] ) {
            $this->error = '设置积分最少大于'. $a['jifen_end'];
            return false;
        }
        $data['wxapp_id'] = '10001';
        $a = Db('vipjifen')->insert($data);
        if ($a) {
            return true;
        }else{
            return false;
        }
    }
    public function vipdelete(){
        $id = request()->param();
        $id1 = str_replace('id=','',$id['id']);
        $a = Db('vipjifen')->where('vipid','=',$id1)->delete();
        if ($a) {
            return $this->renderSuccess('删除成功');
        }
    }
    public function jfjf(){
         if ($this->request->isAjax()) {
            $arr = request()->param();
            $jjj = $arr['jifen'];
            $list=Db('jifen')->where('id','eq',$arr['id'])->setField('socre', $jjj);
            $arr['success'] = 'ok';
            return $arr;
         }else{
                $list=Db('jifen')->select()->toArray();
                return $this->fetch('jfjf',compact('list'));
         }
    }
    public function vipupdate(){
        if ($this->request->isAjax()) {
         $res = request()->param(); 
         $jifen_start = $res['category']['jifen_start'];
         $jifen_end = $res['category']['jifen_end'];
         $id = $res['id'];
         $re = Db('vipjifen')->where('vipid','eq',$id)->update(['jifen_start'=>$jifen_start,'jifen_end'=>$jifen_end]);
         if ($re) {
            return $this->renderSuccess('修改成功', url('Wxapp.page/vip'));
         }
        }
         $id = request()->param();
         $list = Db('vipjifen')->where('vipid','eq',$id['id'])->find();
        return $this->fetch('vipupdate', compact('list'));
    }
}
