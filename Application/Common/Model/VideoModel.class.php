<?php
/**
 * Created by PhpStorm.
 * User: 王振远
 * Date: 2018/3/29
 * Time: 19:04
 */
namespace Common\Model;
use Think\Model;
class VideoModel extends Model
{

    private $_db = '';

    public function __construct()
    {
        $this->_db = M('video');
    }

    public function getVideo($data=array(),$order='',$page=1,$pageSize=10){
        $data['status'] = array('neq',-1);
        if(isset($data['name']) && $data['name']) {
            $data['name'] = array('like','%'.$data['name'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
            ->order($order)
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }
    public function getvideoCount($data){
        return $this->_db->where($data)->count();
    }
    public function getVideoById($id){
        return $this->_db->where('video_id='.$id)->find();
    }
    public function update($id,$data){
        return $this->_db->where('video_id='.$id)->save($data);
    }
}