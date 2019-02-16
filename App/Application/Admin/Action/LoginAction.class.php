<?php

//后台应用登陆页控制器
class LoginAction extends Action{
    //登陆视图
    public function index(){
        $this -> display();
    }
    //登陆表单处理
    public function login(){

        if(!IS_POST) halt('页面不存在，请稍后重试！');
        if(I('code','','md5') != session('verify')){
            $this -> error('验证码不正确！');
        }
        $username = I('username');
        $pwd = I('password','','md5');
        $user = M('user') -> where(array('username' => $username)) -> find();

        if(!$user || $pwd != $user['password']){
            $this -> error('用户名或密码不正确！');
        }
        if($user['lock']) $this -> error('用户被锁定');
        $data = array(
            'id' => $user['id'],
            'logintime' => time(),
            'loginip' => get_client_ip(),
        );
        M('user') -> save($data);
        session(C('USER_AUTH_KEY'),$user['id']);
        session('username',$user['username']);
        session('logintime',date('Y-m-d H:i',$user['logintime']));
        session('loginip',$user['loginip']);

        //超级管理员识别
        if($user['username'] == C('RBAC_SUPERADMIN')){
            session(C('ADMIN_AUTH_KEY'),true);
        }
        //检测用户权限的,并保存到Session中
        import('ORG.Util.RBAC');
        RBAC::saveAccessList();
        /*p($_SESSION);
        die;*/
        $this -> redirect('Admin/Index/index');
    }
    //图片验证码
    public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify(1,1,'png',48,22);
    }
}