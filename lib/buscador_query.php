<?php
//require_once("class.php");
include_once 'lib/ez_sql_core.php';
include_once 'lib/ez_sql_mysql.php';
/* if($_SESSION["session_video_user_25"])
{ */
$db = new ezSQL_mysql('root', '2much', 'movies_fa', 'localhost');

$results = $db->get_results("SELECT * FROM dany2k9 WHERE titulo LIKE '%".$_POST['query']."%'");

echo json_encode($results);

//}