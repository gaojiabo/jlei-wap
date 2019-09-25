<?php
$db = include "../configs/db.php";
$id = $_GET['id'];
$content = $db->query("SELECT n.id,n.title,n.thumb,d.content FROM `jl_news` n LEFT JOIN jl_news_data d ON n.id=d.id WHERE n.id=".$id)->fetchOne();
$content = preg_replace('/<br\s*\/>\s+<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*><br\s*\/>/i','',$content);
echo json_encode(array(
    'data' => $content
));


?>