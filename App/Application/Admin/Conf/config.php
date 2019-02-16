<?php

return array(
    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => __ROOT__.'/'.APP_NAME.'/Application/'.GROUP_NAME.'/Tpl/Public',
    ),
    //伪静态后缀名
    'URL_HTML_SUFFIX' => '',
    // 显示页面Trace信息
    'SHOW_PAGE_TRACE' =>true,

    'RBAC_SUPERADMIN'   => 'admin',              //RBAC超级管理员用户名

    'USER_AUTH_ON'      => true,                 //开启权限验证
    'USER_AUTH_TYPE'    => 1,                    //默认验证类型(1:登陆验证， 2:时时验证)
    'USER_AUTH_KEY'     => 'authId',            //用户认证SESSION标记
    'ADMIN_AUTH_KEY'    => 'superadmin',        //超级管理员识别
    'NOT_AUTH_MODULE'   => 'Login',              //无需认证的控制器
    'NOT_AUTH_ACTION'   => 'login',              //无需认证的方法
    'RBAC_ROLE_TABLE'   => 'ningbo_role',       //角色表
    'RBAC_USER_TABLE'   => 'ningbo_role_user', //角色与用户的中间表
    'RBAC_ACCESS_TABLE' => 'ningbo_access',    //权限表
    'RBAC_NODE_TABLE'   => 'ningbo_node'       //节点表
);