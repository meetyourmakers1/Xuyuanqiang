<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
</head>
<body>
    <table class = 'table'>
        <tr>
            <th colspan="5">所有帖子</th>
        </tr>
        <tr>
            <th>Id</th>
            <th>作者</th>
            <th>内容</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($xuyuanqiang)): foreach($xuyuanqiang as $key=>$v): ?><tr align="center">
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["username"]); ?></td>
                <td><?php echo (replace_biaoqing($v["content"])); ?></td>
                <td><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
                <td>
                    <a href="<?php echo U('Admin/Msgmanage/delete',array('id' => $v['id']));?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan = '5' align = 'center'><?php echo ($page); ?></td>
        </tr>
    </table>
</body>
</html>