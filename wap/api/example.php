<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/24
 * Time: 11:55
 *
 */
$db = include "../configs/db.php";
$page = $_GET['page'];
$limit = '';
$page_config = include "../configs/page.php";
//print_r($page_config);exit;
if($page <= 0){
    $page = 1;
}
$limit = ' limit '.$page_config['example_page'] * ($page - 1).','.$page_config['example_page'];
$content = $db->query("SELECT id,title,thumb,description from jl_news WHERE catid IN (26,28,30,31,34,35) GROUP BY title ORDER BY inputtime DESC".$limit)->fetchAll();
echo json_encode(array(
    'data' => $content
));