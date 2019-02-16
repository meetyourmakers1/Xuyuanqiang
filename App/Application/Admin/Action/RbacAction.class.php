<?php

class RbacAction extends CommonAction{
    //用户列表视图
    public function index(){
        $this -> user = D('UserRelation') -> field('password',true) -> relation('role')-> select();
        $this -> display();
    }
    //角色列表视图
    public function role(){
        $role = M('role') -> select();
        $this -> role = $role;
        $this -> display();
    }
    //节点列表视图
    public function node(){
        $field = array('id','name','title','pid','level');
        $node = M('node') -> field($field)-> order('sort') -> select();
        $node = node_replace($node);
        $this -> node = $node;
        $this -> display();
    }
    //添加用户视图
    public function addUser(){
        $this -> role = M('role') -> select();
        $this -> display();
    }
    //添加用户表单处理
    public function addUserHandle(){
        if(!IS_POST) halt('页面不存在，请稍后重试！');
        $user = M('user') -> where(array('username' => I('username'))) -> find();
        if($user) halt('用户已存在，请稍后重试！');
        $data = array(
            'username' => I('username'),
            'password' => I('password','','md5'),
            'logintime' => time(),
            'loginip' => get_client_ip(),
        );
        $roleId = I('role_id');
        //添加用户
        if($user_id = M('user') -> add($data)){
            $role = array();
            foreach($roleId as $v){
                $role[] = array(
                    'user_id' => $user_id,
                    'role_id' => $v,
                );
            }
            //添加用户角色
            M('role_user') -> addAll($role);
            $this -> success('添加成功！',U('Admin/Rbac/index'));
        }else{
            $this -> error('添加失败！');
        }

    }
    //添加角色视图
    public function addRole(){
        $this -> display();
    }
    //添加角色表单处理
    public function addRoleHandle(){
        if(!IS_POST) halt('页面不存在，请稍后重试！');
        if(!I('name')) halt('添加失败！');
        $role = M('role') -> where(array('name' => I('name'))) -> find();
        if($role) halt('角色已存在，请稍后重试');

        if(M('role') -> add($_POST)){
            $this -> success('添加成功！',U('Admin/Rbac/role'));
        }else{
            $this -> error('添加失败！');
        }
    }
    //添加节点视图
    public function addNode(){
        $this ->pid = I('pid',0,'intval');
        $this -> level = I('level',1,'intval');
        switch ($this -> level){
            case 1:
                $this -> type = '应用';
                break;
            case 2:
                $this -> type = '控制器';
                break;
            case 3:
                $this -> type = '方法';
                break;
        }
        $this -> display();
    }
    //添加节点表单处理
    public function addNodeHandle(){
        if(!IS_POST) halt('页面不存在，请稍后重试！');
        if(!I('name')) halt('添加失败！');
        $node = M('node') -> where(array('name' => I('name'),'level' => I('level'))) -> find();
        //if($node) halt('节点已存在，请稍后重试！');
        if(M('node') -> add($_POST)){
            $this -> success('添加成功！',U('Admin/Rbac/node'));
        }else{
            $this -> error('添加失败！');
        }
    }
    //分配权限视图
    public function access(){
        $roleId = I('roleId','','intval');
        $roleName = I('roleName');
        $field = array('id','title','pid','level');
        $node = M('node') -> field($field) -> order('sort') -> select();
        //原有的权限(节点)
        $access = M('access') -> where(array('role_id' => $roleId)) -> getField('node_id',true);
        $node = node_replace($node,$access);
        $this -> node = $node;
        $this -> roleId = $roleId;
        $this -> roleName = $roleName;
        $this -> display();
    }
    //分配权限表单处理
    public function setAccess(){
        if(!IS_POST) halt('页面不存在，请稍后重试！');
        $roleId = I('role_id','','intval');
        M('access') -> where(array('role_id' => $roleId)) -> delete();
        $node = I('node');
        $arr = array();
        foreach ($node as $v){
            $access = explode('_',$v);
            $arr[] = array(
                'role_id' => $roleId,
                'node_id' => $access[0],
                'level' => $access[1],
            );
        }
        if(M('access') -> addAll($arr)){
            $this -> success('保存成功！',U('Admin/Rbac/role'));
        }else{
            $this -> error('保存失败！');
        }
    }
}