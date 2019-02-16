<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>角色列表</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
</head>
<body>
    <table class="table">
        <tr>
            <th colspan="5" align="left">角色列表</th>
        </tr>
        <tr>
            <th>角色ID</th>
            <th>角色名称</th>
            <th>角色描述</th>
            <th>开启状态</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($role)): foreach($role as $key=>$v): ?><tr align="center">
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo ($v["remark"]); ?></td>
                <td>
                    <?php if($v['status']): ?>开启
                    <?php else: ?>
                        关闭<?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo U('Admin/Rbac/access',array('roleId' => $v['id'],'roleName' => $v['remark']));?>">分配权限</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>
</html>