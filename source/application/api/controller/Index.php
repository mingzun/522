<?php

namespace app\api\controller;

use app\api\model\WxappPage;
use app\api\model\Goods as GoodsModel;
use app\common\model\Tcmarket as TcmarketModel;
use app\common\model\Hsz as HszModel;
use app\common\model\HszCategory as HszCategoryModel;
use app\common\model\Lbzx as LbzxModel;
use app\common\model\LbzxCategory as LbzxCategoryModel;
use app\common\model\TcscCategory as TcscCategoryModel;
use app\common\model\Imagebanner as ImagebannerModel;
use app\common\model\Jjg as JjgModel;
use app\common\model\Syfl as SyflModel;
use think\Db;
use app\common\model\Category as CategoryModel;

/**
 * 首页控制器
 * Class Index
 * @package app\api\controller
 */
class Index extends Controller
{
    /**
     * 首页diy数据
     * @return array
     * @throws \think\exception\DbException
     */
    public function page()
    {
        // 页面元素
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        // 新品推荐
        $model = new GoodsModel;
        $newest = $model->getNewList();
        // 猜您喜欢
        $best = $model->getBestList(); 
        //小喇叭
        $msg = Db('Tcmarket')
        ->alias('a')
        ->join('user b','a.user_id = b.user_id','LEFT')
        ->order('time desc')
        ->limit('10')
        ->select()
        ->toArray();
        foreach ($msg as &$value) {
            $value['lalala']= str_replace(mb_substr($value['nickName'],'-2'),'**',$value['nickName']) .'在'.date('Y-m-d H:i:s',$value['time']).':  发布了'.str_replace(mb_substr($value['Remarks'],'3','2'),'**',$value['Remarks']);      
        }
        return $this->renderSuccess(compact('items', 'newest', 'best','msg'));
    }
    //家居馆首页
    public function jjg(){
        // 页面元素
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        // 本地优选
        $model = new GoodsModel;
        $newest = $model->getNewListjjg();
        // 热销产品
        $best = $model->getBestListjjg(); 
        $bn = new ImagebannerModel; 
        $banner = $bn->detail('1004');
        return $this->renderSuccess(compact('items', 'newest', 'best','banner'));
    }
    //家居馆首页一级分类
    public function jjgcategory(){
        $model = new CategoryModel;
        $list = $model->where('parent_id','=','10035')
            ->select();
        return $this->renderSuccess(compact('list'));
    }
    public function pagevip()
    {
        // 页面元素
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        // 新品推荐
        $model = new GoodsModel;
        $newest = $model->getNewListvip();
        // 猜您喜欢
        $best = $model->getNewListvip();  
        return $this->renderSuccess(compact('items', 'newest', 'best'));
    }
    //首页分类-每日新鲜
    public function syflmrxx(){
        $model = new SyflModel;
        $mrxx = $model->where('sufl','eq','每日新鲜')->select();
        return $this->renderSuccess(compact('mrxx'));
    }
        //首页分类-天天特价
    public function syfltttt(){
        $model = new SyflModel;
        $tttt = $model->where('sufl','eq','天天特价')->select();
        return $this->renderSuccess(compact('tttt'));
    }
        //首页分类-生活必备
    public function syflshbb(){
        $model = new SyflModel;
        $shbb = $model->where('sufl','eq','生活必备')->select();
        return $this->renderSuccess(compact('shbb'));
    }
    //分类详情页
    public function pagelist($option){
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        $model = new GoodsModel;
        $best = $model->getBestList1($option);
        return $this->renderSuccess(compact('items','best'));

    }    
    //跳槽市场首页
    public function showtc(){
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        $model = new TcmarketModel;
        $tclist = $model->getBestList();
        $bn = new ImagebannerModel; 
        $banner = $bn->detail('1002');
        return $this->renderSuccess(compact('items','tclist','banner'));

    }
    //跳槽市场分类查询
    public function fenlei($category_id){
        $model = new TcscCategoryModel;
        $tclist = $model->fenlei($category_id);
        return  $this->renderSuccess(compact('tclist'));
    }
    //回收站首页
    public function showhsc(){
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        $model = new HszModel;
        $arr=Db('image_banner')->where('type','=','回收站')->find();
        $bn = new ImagebannerModel; 
        $banner = $bn->detail('1003');
        $hsclist = $model->getBestList();
        return $this->renderSuccess(compact('items','hsclist','banner'));

    }
    //回收站分类获取
    public function hscfenlei(){
        $list =new HszCategoryModel;
        $list = $list->order('category_id')->select();
        return $this->renderSuccess(compact('list'));
    }
    //回收站分类查询
    public function scfenlei($category_id){
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        $model = new HszModel;
        $hsclist = $model->fenlei($category_id);
        return $this->renderSuccess(compact('items','hsclist'));

    }
    //鲁班在线
    public function lbzx(){
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        $model = new LbzxModel;
        $hsclist = $model->getBestList();
        $arr=Db('image_banner')->where('type','=','鲁班在线')->find();
        $bn = new ImagebannerModel; 
        $banner = $bn->detail('1001');
        return $this->renderSuccess(compact('items','hsclist','banner'));

    }
    //鲁班在线详情
    public function lbzxxq($id){
        $model =new LbzxModel;
        $hsclist = $model->getBestListxq($id);
        return $this->renderSuccess(compact('hsclist'));
    }
    //鲁班在线分类获取
    public function lbzfenlei(){
        $list =new LbzxCategoryModel;
        $list = $list->order('category_id')->select();
        return $this->renderSuccess(compact('list'));
    }
    //鲁班在线分类查询
    public function lbzxfenlei($category_id){
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        $model = new LbzxModel;
        $hsclist = $model->fenlei($category_id);
        return $this->renderSuccess(compact('items','hsclist'));

    }
    //跳槽市场分类获取
    public function tcscfenlei(){
        $list =new TcscCategoryModel;
        $list = $list->order('category_id')->select();
        return $this->renderSuccess(compact('list'));
    }
        //跳槽市场分类
    public function tcsctcscfenlei($category_id){
        $wxappPage = WxappPage::detail();
        $items = $wxappPage['page_data']['array']['items'];
        $model = new TcmarketModel;
        $tclist = $model->fenleitc($category_id);
        return $this->renderSuccess(compact('items','tclist'));

    }
    //跳槽市场发布获取文件名称
    public function addtc(){
        $model = new TcmarketModel;
        $file = request()->file('file');
        $a = '';
        if ($file) {
            $info = $file->move(ROOT_PATH . '../web/uploads');
            $a .= $info->getSaveName();
        }

        $best = ['status_code'=>'200','filename'=>$a,'statusCode'=>'200'];
          return $best;
    }
    //跳槽市场二级分类
    public function getTree() {
        $model = new TcscCategoryModel;
        $select = $model
            ->select();
        foreach($select as $key => $v) {
            $name[]= $v['name'];
            $index[]= $v['category_id'];
        }
            
            
        foreach ($name as $key => $value) {
            if ($value == "全部分类"){
                unset($name[$key]);
            }
            $selectname = array_merge($name);
        }
        foreach ($index as $key => $value) {
            if ($value == "1"){
                unset($index[$key]);
            }
            $array = array_merge($index);

        }
        return $this->renderSuccess(compact('select','selectname','array'));
    }
    //跳槽市场发布.
    public function addtc1(){
        $res = request()->param();
        $ress =  $res['pms'];
        $a=str_replace('&quot;','',$ress);
        $b=str_replace('{','',$a);
        $d=str_replace('}','',$b);
        $e=str_replace('cid:','',$d);
        $f=str_replace('Remarks:','',$e);
        $ff=str_replace('content:','',$f);
        $g=str_replace('c:','',$ff);
        $h=str_replace('money:','',$g);
        $i=str_replace('phone:','',$h);
        $ii=str_replace('beizhu:','',$i);
        $j=str_replace('pic1:','',$ii);
        $k=str_replace('pic2:','',$j);
        $l=str_replace('pic3:','',$k);
        $m=str_replace('pic4:','',$l);
        $n=str_replace('pic5:','',$m);
        $o=str_replace('pic6:','',$n);
        $p=str_replace('pic7:','',$o);
        $q=str_replace('pic8:','',$p);
        $r=str_replace('pic9:','',$q);
        $s = explode(',', $r);
        $ss['user_id']=$s['0'];
        $ss['Remarks']=$s['1'];
        $ss['content']=$s['2'];
        $ss['category_id']=$s['4'];
        $ss['money']=$s['7'];
        $ss['phone']=$s['8'];
        $ss['beizhu']=$s['9'];
        $ss['thum']=$s['10'];
        if ($s['10'] !== '') {
           $ss['picture1']=$s['10'];
        }else{
           $ss['picture1']='0';
        }
        if ($s['11'] !== '') {
           $ss['picture2']=$s['11'];
        }else{
           $ss['picture2']='0';
        }
        if ($s['12'] !== '') {
           $ss['picture3']=$s['12'];
        }else{
           $ss['picture3']='0';
        }
        if ($s['13'] !== '') {
           $ss['picture4']=$s['13'];
        }else{
           $ss['picture4']='0';
        }
        if ($s['14'] !== '') {
           $ss['picture5']=$s['14'];
        }else{
           $ss['picture5']='0';
        }
        if ($s['15'] !== '') {
           $ss['picture6']=$s['15'];
        }else{
           $ss['picture6']='0';
        }
        if ($s['16'] !== '') {
           $ss['picture7']=$s['16'];
        }else{
           $ss['picture7']='0';
        }
        if ($s['17'] !== '') {
           $ss['picture8']=$s['17'];
        }else{
           $ss['picture8']='0';
        }
        if ($s['18'] !== '') {
           $ss['picture9']=$s['18'];
        }else{
           $ss['picture9']='0';
        }
        $ss['time'] = time();
        $ss['wxapp_id'] = $res['wxapp_id'];
        $model = new TcmarketModel;
        $res = $model->allowField(true)->save($ss);
        return $this->renderSuccess(compact('res'));
    }
    public function fenxiang(){
        $res = request()->param();
        $cs = Db('jifen')->where('id','eq','1')->find();
        $r = Db('user')->where('user_id','=',$res['user'])->update(['fenxiangcishu'=>`fenxiangcishu`+ 1 , 'score' => `score`+$cs['socre']]);
        if ($r) {
            return $this->renderSuccess(compact('r'));
        }
    }
    public function mytcshop(){
        $user_id = request()->param();
        $model = new TcmarketModel;
         $arr = $model->where('user_id','=',$user_id['user_id'])->select();
         foreach ($arr as $key => $value) {
             $list[$key]['id'] = $value['id'];
             $list[$key]['time'] = date('Y-m-d H:i:s',$value['time']);
             $list[$key]['liulanliang'] = $value['liulanliang'];
             $list[$key]['beizhu'] = $value['beizhu'];
             $list[$key]['thum'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['thum'];
         }
        return $this->renderSuccess(compact('list'));
    }
    public function mytcshopdelete()
    {
        $id = request()->param();
        $model = new TcmarketModel;
        $arr = $model->where('id','=',$id['id'])->delete();
        if ($arr) {
            $msg = '删除成功';
            return $this->renderSuccess(compact('msg'));
        }
    }
    public function ggspxq()
    {
        $id = request()->param();
        $model = new TcmarketModel;
        $arr = $model->alias('a')->field('a.*,b.name')->join('tcsc_category b','a.category_id = b.category_id')->where('id','=',$id['options'])->select();
        foreach ($arr as $key => $value) {
            $list[$key]['thum'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['thum'];
                        if ($value['picture1']) {
                $list[$key]['pics']['0'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture1'];
            }
                        if ($value['picture2']) {
                $list[$key]['pics']['1'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture2'];
            }
                        if ($value['picture3']) {
                $list[$key]['pics']['2'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture3'];
            }
                        if ($value['picture4']) {
                $list[$key]['pics']['3'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture4'];
            }
                        if ($value['picture5']) {
                $list[$key]['pics']['4'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture5'];
            }
                        if ($value['picture6']) {
                $list[$key]['pics']['5'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture6'];
            }
                        if ($value['picture7']) {
                $list[$key]['pics']['6'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture7'];
            }
                        if ($value['picture8']) {
                $list[$key]['pics']['7'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture8'];
            }
                        if ($value['picture9']) {
                $list[$key]['pics']['8'] = 'http://'.$_SERVER['HTTP_HOST'].'\/uploads/'.$value['picture9'];
            }
             $list[$key]['id'] = $value['id'];
             $list[$key]['beizhu'] = $value['beizhu'];
             $list[$key]['money'] = $value['money'];
             $list[$key]['content'] = $value['content'];
             $list[$key]['phone'] = $value['phone'];
             $list[$key]['Remarks'] = $value['Remarks'];
             $list[$key]['category'] = $value['name'];
             $list[$key]['category_id'] = $value['category_id'];
            
        }
        $list = reset($list);
        return $this->renderSuccess(compact('list'));
    }
     //跳槽市场更改
    public function gxaddtc1(){
        $res = request()->param();
        $ress =  $res['pms'];
        $a=str_replace('&quot;','',$ress);
        $b=str_replace('{','',$a);
        $d=str_replace('}','',$b);
        $e=str_replace('cid:','',$d);
        $f=str_replace('Remarks:','',$e);
        $ff=str_replace('content:','',$f);
        $g=str_replace('c:','',$ff);
        $h=str_replace('money:','',$g);
        $hh=str_replace('shopid:','',$h);
        $i=str_replace('phone:','',$hh);
        $ii=str_replace('beizhu:','',$i);
        $j=str_replace('pic1:','',$ii);
        $k=str_replace('pic2:','',$j);
        $l=str_replace('pic3:','',$k);
        $m=str_replace('pic4:','',$l);
        $n=str_replace('pic5:','',$m);
        $o=str_replace('pic6:','',$n);
        $p=str_replace('pic7:','',$o);
        $q=str_replace('pic8:','',$p);
        $r=str_replace('pic9:','',$q);
        $s = explode(',', $r);
        $ss['user_id']=$s['0'];
        $ss['Remarks']=$s['1'];
        $ss['content']=$s['2'];
        $ss['category_id']=$s['4'];
        $ss['money']=$s['7'];
        $ss['shopid']=$s['8'];
        $ss['phone']=$s['9'];
        $ss['beizhu']=$s['10'];
        $time = date('Ymd');
        if (isset($s['11'])) {
            $ss['thum']=strstr($s['11'],$time);
           $ss['picture1']=strstr($s['11'],$time);
        }else{
           $ss['picture1']='0';
        }
        if (isset($s['12'])) {
           $ss['picture2']=strstr($s['12'],$time);
        }else{
           $ss['picture2']='0';
        }
        if (isset($s['13'] )) {
           $ss['picture3']=strstr($s['13'],$time);
        }else{
           $ss['picture3']='0';
        }
        if (isset($s['14'])) {
           $ss['picture4']=strstr($s['14'],$time);
        }else{
           $ss['picture4']='0';
        }
        if (isset($s['15'])) {
           $ss['picture5']=strstr($s['15'],$time);
        }else{
           $ss['picture5']='0';
        }

        if (isset($s['16'])) {
           $ss['picture6']=strstr($s['16'],$time);
        }else{
           $ss['picture6']='0';
        }
        if (isset($s['17'])) {
           $ss['picture7']=strstr($s['17'],$time);
        }else{
           $ss['picture7']='0';
        }
        if (isset($s['18'])) {
           $ss['picture8']=strstr($s['18'],$time);
        }else{
           $ss['picture8']='0';
        }
        if (isset($s['19'])) {
           $ss['picture9']=strstr($s['19'],$time);
        }else{
           $ss['picture9']='0';
        }
        $ss['time'] = time();
        $ss['wxapp_id'] = $res['wxapp_id'];
        unset($ss['shopid']);
        $model = new TcmarketModel;
        $res = $model->where('id','=',$s['8'])->update($ss);
        return $this->renderSuccess(compact('res'));
    }


}   
