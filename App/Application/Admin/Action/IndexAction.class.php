<?php

//后台应用首页控制器
class IndexAction extends CommonAction{

    public function index(){
        $this -> username = $_SESSION['username'];
        $this -> display();
    }
    public function loginout(){
        session_unset();
        session_destroy();
        $this -> redirect('Admin/Login/index');
    }
}