<?php
/**
 * Created by PhpStorm.
 * User: 王振远
 * Date: 2018/3/28
 * Time: 19:27
 */

namespace Home\Controller;


use Think\Controller;

class VideoController extends Controller
{
    public function basic(){
        $isuser=0;
        if(session('user')){
            $reg=D('User')->getUserById(session('user')['user_id']);
            $style_id=$reg['style_id'];
            $isuser=1;
        }elseif(session('style_id')){
            $style_id=session('style_id');
        }else{
            $style_id=1;
        }
        $res=D('Style')->getStyleById($style_id);
        $this->assign('color',$res['name']);
        $this->assign('isuser',$isuser);
        $data['status']=1;
        $style=D('Style')->getStyle($data);
        $this->assign('styles',$style);
    }
    public function index(){
        $this->basic();
        $this->display();
    }
    public function main($name='',$order='video_id desc'){
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 9;
        $data=[];
        if($name){
            $data['name']=$name;
        }
        $videos=D('Video')->getVideo($data,$order,$page,$pageSize);
        $videoCount = D("Video")->getvideoCount($data);
        $res = new \Think\Page($videoCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('name',$name);
        $this->assign('videos',$videos);

        $this->display();
    }
    public function detail(){
        if(!$_GET['id']||!is_numeric($_GET['id'])){
            $this->assign('message','id不合法');
            $this->display("Index/error");
            exit;
        }
        $video=D("Video")->getVideoById($_GET['id']);
        D('Video')->update($_GET['id'],['play_num'=>$video['play_num']+1]);
        if($video){
            $this->assign('video',$video);
            $this->display();

        }else{
            $this->assign('message','未找到该视频');
            $this->display("Index/error");
            exit;
        }
    }
    public function orderbyplay($name='',$order='play_num desc'){
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 9;
        $data=[];
        if($name){
            $data['name']=$name;
        }
        $videos=D('Video')->getVideo($data,$order,$page,$pageSize);
        $videoCount = D("Video")->getvideoCount($data);
        $res = new \Think\Page($videoCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('name',$name);
        $this->assign('videos',$videos);

        $this->display("video/main");
    }
    public function orderbydanmu($name='',$order='danmu_num desc'){
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 9;
        $data=[];
        if($name){
            $data['name']=$name;
        }
        $videos=D('Video')->getVideo($data,$order,$page,$pageSize);
        $videoCount = D("Video")->getvideoCount($data);
        $res = new \Think\Page($videoCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('name',$name);
        $this->assign('videos',$videos);

        $this->display("video/main");
    }
}