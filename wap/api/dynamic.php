<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/24
 * Time: 9:57
 *
 */
$db = include "../configs/db.php";
$content = $db->query("select id,content FROM jl_news_data WHERE id=339")->fetchOne();
//print_r($content['content']);exit;
$re = preg_match_all('/\>\s+(.*)<br/',$content['content'],$pat_array);
foreach ($pat_array[1] as $k => $v){
    $pat_array[1][$k] = strip_tags($v);
}
echo json_encode(array(
    'data' => $pat_array[1]
));