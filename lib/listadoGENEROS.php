<?php
require_once("class.php");
//print_r($_GET);
$user = $_GET['user'];
$disc = $_GET['discarea'];
$genre = $_GET['genre'];

$sql = "select DISTINCT genres".$user.".generos, ".$user.".titulo, ".$user.".img_thumb FROM genres".$user.", ".$user."
where
generos = '".$genre."' and
".$user.".titulo = genres".$user.".id_movie order by genres".$user.".id_movie asc";
$res = mysql_query($sql, Conectar::con());

	while($reg=mysql_fetch_array($res))
	{
	?>
	<a href='#' onclick='return false' onmousedown="javascript:swapContent('<? echo $reg["titulo"]; ?>',
'<? echo $user; ?>')" id='linkBtn' onblur=''><img src="<? echo "http://localhost/movies_ci/".$reg['img_thumb']?>" title="<? echo rtrim($reg['titulo'])?>" id='thumbIndex'/></a>
	<?
	}


$sql2 = "SELECT * FROM ".$user." WHERE disco IS NOT NULL and disco != 0 and disco = '".$disc."' order by titulo asc";
$res2 = mysql_query($sql2, Conectar::con()); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Detalle</title>
	<link href="estilo_min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?
	while($reg2=mysql_fetch_array($res2))
	{
	?>
    <a href="#" onclick="return false" onmousedown="javascript:swapContent('<? echo $reg2["titulo"]; ?>',
'<? echo $user; ?>')" id='linkBtn' onblur=''><img src="<? echo "http://localhost/movies_ci/".$reg2['img_thumb']?>" title="<? echo rtrim($reg2['titulo'])?>" id='thumbIndex'/></a>
	<?
	} 

?>
<div id="myDiv">My default content</div>
<div id="log"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src=functions.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('#data2').css({"opacity": "0.85"});
			$("#data2").delay(200).fadeIn("slow");



	});
</script>

</body>
</html>