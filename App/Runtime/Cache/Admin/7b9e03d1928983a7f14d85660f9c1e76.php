<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户列表</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
</head>
<body>
    <table class="table">
        <tr>
            <th colspan="7" align="left">用户列表</th>
        </tr>
        <tr>
            <th>用户ID</th>
            <th>用户名称</th>
            <th>上次登陆时间</th>
            <th>上次登陆IP</th>
            <th>锁定状态</th>
            <th>所属角色</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($user)): foreach($user as $key=>$v): ?><tr align="center">
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>
                <td><?php echo (date('y-m-d H:i',$v["logintime"])); ?></td>
                <td><?php echo ($v["loginip"]); ?></td>
                <td>
                    <?php if($v['lock']): ?>锁定
                    <?php else: ?>
                        未锁定<?php endif; ?>
                </td>
                <td>
                    <?php if($v['username'] == C('RBAC_SUPERADMIN')): ?>超级管理员
                    <?php else: ?>
                        <?php if(is_array($v["role"])): foreach($v["role"] as $key=>$role): ?><ul>
                                <li><?php echo ($role["remark"]); ?></li>
                            </ul><?php endforeach; endif; endif; ?>
                </td>
                <td>
                    <a href="">锁定</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>
</html>