<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分配权限</title>
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css">
    <link rel="stylesheet" href="__PUBLIC__/Css/node.css">
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('input[level=1]').click(function(){
                var inputs = $(this).parents('.app').find('input');
                $(this).attr('checked')?inputs.attr('checked','checked'):
                    inputs.removeAttr('checked');
            });
            $('input[level=2]').click(function () {
                var inputs = $(this).parents('dl').find('input');
                $(this).attr('checked')?inputs.attr('checked','checked'):
                    inputs.removeAttr('checked');
            });
        });
    </script>
</head>
<body>
<table class="table">
        <div id="wrap">
            <form action="<?php echo U('Admin/Rbac/setAccess');?>" method="post">
                <a href="" class="node"><?php echo ($roleName); ?>&nbsp;&nbsp;权限配置</a>
                <?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
                        <div>
                            <strong><?php echo ($app["title"]); ?></strong>
                            <input type="checkbox" name="node[]" value="<?php echo ($app["id"]); ?>_1" level="1" <?php if($app["access"]): ?>checked = 'checked'<?php endif; ?>>
                        </div>
                        <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
                                <dt>
                                    <strong><?php echo ($action["title"]); ?></strong>
                                    <input type="checkbox" name="node[]" value="<?php echo ($action["id"]); ?>_2" level="2" <?php if($action["access"]): ?>checked = 'checked'<?php endif; ?>>
                                </dt>
                                <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
                                        <span><?php echo ($method["title"]); ?></span>
                                        <input type="checkbox" name="node[]" value="<?php echo ($method["id"]); ?>_3" level="3"<?php if($method["access"]): ?>checked = 'checked'<?php endif; ?>>
                                    </dd><?php endforeach; endif; ?>
                            </dl><?php endforeach; endif; ?>
                    </div><?php endforeach; endif; ?>
                <input type="hidden" name="role_id" value="<?php echo ($roleId); ?>">
                <input type="submit" value="保存添加" class="tijiao">
            </form>
        </div>
</table>
</body>
</html>