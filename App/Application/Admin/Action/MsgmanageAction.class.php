<?php

class MsgmanageAction extends CommonAction{
    public function index(){
        import('ORG.Util.Page');
        $totalcount = M('xuyuanqiang') -> count();
        $page = new Page($totalcount,10);

        $limit = $page -> firstRow.','.$page -> listRows;
        $xuyuanqiang = M('xuyuanqiang') -> order('time DESC') -> limit($limit) -> select();

        $this -> xuyuanqiang = $xuyuanqiang;
        $this -> page = $page -> show();
        $this -> display();
    }
    public function delete(){
        $id = I('id','','intval');
        if(M('xuyuanqiang') -> delete($id)){
            $this -> success('删除成功！',U('Admin/Msgmanage/index'));
        }else{
            $this -> error('删除失败！');
        }
    }
}