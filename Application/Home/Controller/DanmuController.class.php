<?php
/**
 * Created by PhpStorm.
 * User: 王振远
 * Date: 2018/3/28
 * Time: 19:27
 */

namespace Home\Controller;


use Think\Controller;

class DanmuController extends Controller
{
    public function query(){
        $id=$_GET['vid'];
        $data=D('Danmu')->getAll($id);
        $content='[';
        foreach($data as $d){
            if($content!='['){
                $content.=',';
            }
            $content.=("'".$d['content']."'");
        }
        $content.=']';
        echo $content;
    }
    public function stone(){
        $data['video_id']=$_GET['vid'];
        $data['content']=$_GET['danmu'];
        $data['create_time']=time();
        $data['user_id']=session('user')['user_id'];
        D('Danmu')->add($data);
        $video=D('Video')->getVideoById($data['video_id']);
        D('Video')->update($data['video_id'],['danmu_num'=>$video['danmu_num']+1]);
        echo $data['content'];
    }
}