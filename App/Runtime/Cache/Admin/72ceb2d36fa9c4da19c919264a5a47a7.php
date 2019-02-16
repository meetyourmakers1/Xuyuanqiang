<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>许愿墙后台管理系统</title>
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/index.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
</head>
<body>
	<div id="top">
		<!--<div class="menu">
			<a href="<?php echo U('Admin/Rbac/Index');?>">用户列表</a>
			<a href="<?php echo U('Admin/Rbac/role');?>">角色列表</a>
			<a href="<?php echo U('Admin/Rbac/node');?>">节点列表</a>
			<a href="<?php echo U('Admin/Rbac/addUser');?>">添加用户</a>
			<a href="<?php echo U('Admin/Rbac/addRole');?>">添加角色</a>
			<a href="<?php echo U('Admin/Rbac/addNode');?>">添加节点</a>
		</div>-->
		<div>
			<span class="title">后台管理系统</span>
		</div>
		<div class="exit">
			<span class="username"><?php echo ($username); ?>在线</span>
			<a href="<?php echo U('Admin/Index/loginout');?>" target="_self">退出</a>
		</div>
	</div>
	<div id="left">
		<dl>
			<dt>帖子管理</dt>
			<dd><a href="<?php echo U('Admin/Msgmanage/index');?>">所有帖子</a></dd>
		</dl>
		<dl>
			<dt>权限管理(RBAC)</dt>
			<dd><a href="<?php echo U('Admin/Rbac/Index');?>">用户列表</a></dd>
			<dd><a href="<?php echo U('Admin/Rbac/role');?>">角色列表</a></dd>
			<dd><a href="<?php echo U('Admin/Rbac/node');?>">节点列表</a></dd>
			<dd><a href="<?php echo U('Admin/Rbac/addUser');?>">添加用户</a></dd>
			<dd><a href="<?php echo U('Admin/Rbac/addRole');?>">添加角色</a></dd>
			<dd><a href="<?php echo U('Admin/Rbac/addNode');?>">添加节点</a></dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src="<?php echo U('Admin/Msgmanage/index');?>"></iframe>
	</div>
</body>
</html>