<?php

function p($array){
    dump($array,true,'<pre>',0);
}

//发布内容表情替换
function replace_biaoqing($content){
    preg_match_all('/\[.*?\]/',$content,$arr);
    $biaoqing = F('biaoqing','','./Biaoqing/');
    foreach($arr[0] as $v){
        foreach($biaoqing as $key => $val){
            if($v == '['.$val.']'){
                $content = str_replace($v,'<img src="'.__ROOT__.'/Public/Images/biaoqing/'.$key.'.gif">',$content);
                break;
            }
        }
    }
    return $content;
}