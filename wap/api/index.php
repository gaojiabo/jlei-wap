<?php
$db = include "../configs/db.php";
$content = $db->query("select title,winning_date from jl_winnin a left join jl_winnin_data b on a.id = b.id where catid = 66  order by winning_date desc limit 15")->fetchAll();
echo json_encode(array(
    'winning' => $content
));