<?php
$db = include "../configs/db.php";
$page = $_GET['page'];
$limit = '';
$page_config = include "../configs/page.php";
//print_r($page_config);exit;
if($page <= 0){
    $page = 1;
}
$limit = ' limit '.$page_config['voice_page'] * ($page - 1).','.$page_config['voice_page'];
$content = $db->query("SELECT id,title,thumb from jl_news WHERE catid=10 ORDER BY inputtime DESC ".$limit)->fetchAll();
if(!empty($content)){
    foreach ($content as $k => $v){
        if(!$v['thumb']){
            $content[$k]['thumb'] = 'http://www.jianlei.com/uploadfile/2019/0830/20190830055639803.jpg';
        }
    }
}
echo json_encode(array(
    'voice' => $content
));