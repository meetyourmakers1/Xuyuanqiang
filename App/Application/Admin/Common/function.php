<?php

//递归重组节点为多维数组
function node_replace($node,$access = null,$pid = 0){
    $arr = array();
    foreach ($node as $v){
        if(is_array($access)){
            $v['access'] = in_array($v['id'],$access)?1:0;
        }
        if($v['pid'] == $pid){
            $v['child'] = node_replace($node,$access,$v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}
