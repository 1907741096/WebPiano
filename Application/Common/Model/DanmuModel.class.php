<?php
/**
 * Created by PhpStorm.
 * User: 王振远
 * Date: 2018/3/29
 * Time: 19:04
 */
namespace Common\Model;
use Think\Model;
class DanmuModel extends Model
{

    private $_db = '';

    public function __construct()
    {
        $this->_db = M('danmu');
    }
    public function getAll($id){
        $data['status'] = array('neq',-1);
        $data['video_id'] = $id;
        $list = $this->_db->where($data)->select();
        return $list;
    }
    public function add($data){
        return $this->_db->add($data);
    }
}