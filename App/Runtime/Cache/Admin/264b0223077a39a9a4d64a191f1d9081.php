<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加角色</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
</head>
<body>
    <form action="<?php echo U('Admin/Rbac/addRoleHandle');?>" method="post">
        <table class="table">
            <tr>
                <th colspan="2" align="left">添加角色</th>
            </tr>
            <tr>
                <td align="right" width="44%">角色名称</td>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td align="right">角色描述</td>
                <td>
                    <input type="text" name="remark">
                </td>
            </tr>
            <tr>
                <td align="right">开启状态</td>
                <td>
                    <input type="radio" name="status" value="1">&nbsp;开启&nbsp;
                    <input type="radio" name="status" value="0">&nbsp;关闭&nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input class="submit" type="submit" value="保存添加">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>