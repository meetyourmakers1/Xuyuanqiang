<?php

/*
 * 前台首页控制器
 * */
class IndexAction extends Action{
    //首页视图
    public function index(){
        $this -> assign('xuyuanqiang',M('xuyuanqiang') -> select()) -> display();
    }

    //异步发布处理
    public function handle(){
        if(!IS_AJAX) halt('页面不存在,请稍后再试。');
        $data = array(
            'username' => I('post.username'),
            'content' => I('content'),
            'time' => time(),
        );
        if($id = M('xuyuanqiang') -> data($data) -> add()){
            $data['id'] = $id;
            $data['content'] = replace_biaoqing($data['content']);
            $data['time'] = date('Y-m-d H:i',$data['time']);
            $data['status'] = 1;
            $this -> ajaxReturn($data,'json');
        }else{
            $this -> ajaxReturn(array('status' => 0),'json');
        }
    }
}