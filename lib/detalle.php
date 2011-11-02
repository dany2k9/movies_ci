<?php
require_once("class.php");
//print_r($_POST);
$titl = $_GET['idVar'];          //variable que llega por Ajax para el lightbox
$user = $_POST['user'];
$sql = "SELECT * FROM dany2k9 WHERE titulo = '$titl' ";
$res = mysql_query($sql, Conectar::con());
while($row=mysql_fetch_array($res))
{
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Detalle</title>
	<link href="estilo_min.css" type="text/css" rel="stylesheet" />
	<script src="jquery-1.5.1.min.js"></script>
	<script src="functions.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('#data').css({"opacity": "0.85"});
			$("#data").delay(500).fadeIn("slow");

		$("#exit").click(function(){
		$("#data").delay(500).fadeOut("slow");
		$("#myDiv").delay(500).fadeOut("slow");
		});	
		
		$("#thumb").click(function(){
			//alert('hi');
			$("#thumb_content").css({ "display" : "block" });
		});
		
		$("#thumb_content").click(function(){
			$(this).css({ "display" : "none" });
		});
		
		$("#editBtnImg").click(function(){
			$("#ima").css('display', 'block');
			$("#datos").css('margin-top', '-52.7%');
		});
		
		$("#editBtn").click(function(){
			$("#plot, #length, #dir, #cast, #genre, #yea, #rank").removeAttr("readonly");
			$("#plot, #length, #dir, #cast, #genre, #yea, #rank").css("background-color", "white");
			$("#saveBtn").css('display', 'block');
			//$("#datos").css('margin-top', '-48.7%');
		});
		$('#botInfoExt').click(function(){
			$('#datosExt').css('display', 'block');
			$('#datos').css('display', 'none');
		});
		
		$('#botInfoBase').click(function(){
			$('#datos').css('display', 'block');
			$('#datosExt').css('display', 'none');
		}); 
	});		
</script>
</head>
<body>
	

<!-- div principal -->
<div id='page_wrapper2'>


<!-- div titulo + eliminar + editar + editar imagen + imagen -->
<div id="divTit">
	<div  id="divData">
	<form action="http://localhost/movies_ci/movies/edit" name="form" method="post">
	<h3 class="titleDetails" name="title1"><?echo $row["titulo"] ?></h3>
	<a href="#" id="exit" class="salir">X</a>
	
	<div id="botInfoBase" class="tab"><a href="#">Info Basica</a></div><div id="botInfoExt" class="tab"><a href="#">Detalles</a></div>
	<div id ='saveBtn' class='tab'>
	<a href="#" onclick="document.form.submit()">Guardar</a>
	</div>
	<!-- div eliminar + editar + editar imagen -->
	<!--<input type="submit" id ="saveBtn" value="Guardar cambios" style="display:none" />-->
	
	</div>
	<!-- div eliminar + editar + editar imagen -->
	
	<!-- imagen -->
	<br />
	<img src="<? echo "http://localhost/movies_ci/".$row["img_thumb"] ?>" id="thumb" title="Click para ver en tama&ntilde;o original" /><br />
	<!-- imagen -->

	<!-- form para cambiar imagen-->
	<div id="ima">
	<form method="post" action="images/confirm_ima.php?tit=<? echo $_GET["id"] ?>" enctype="multipart/form-data">
	Imagen:<input type="file" name="foto" required size="1"/>
	<br />
	Nombre: <input type="text" name="nom"size="10"/>
	<br />
	<input type="submit" value="Confirmar"/>
	</form>
	</div>
	<!-- form para cambiar imagen-->
	
</div>
<!-- div titulo + eliminar + imagen -->

<!-- div data -->
<div id="datos">
	

	<span class="titleIndex3">Resumen:</span><div id="divData"><textarea rows="21" cols="85" readonly="readonly"  id="plot" name="plot_area"><? echo utf8_encode($row["plot"]) ?></textarea></div>
		
</div>
<div id="datosExt">
	<a href="javascript:void(0);" onclick="eliminar('elim.php?tit=<?php echo $row["titulo"]; ?>')" class="titleIndex2">Eliminar</a><a href="javascript:void(0);" id ="editBtn" class="titleIndex2">Habilitar Editar</a><a href="javascript:void(0);" id ="editBtnImg" class="titleIndex2">Cambiar Imagen</a>
	<br />
	<span class="titleIndex3">Duraci&oacute;n:</span><div  id="divData"><textarea rows="1" cols="85" readonly="readonly"  id="length" name="durac_area"><? echo $row["duracion"] ?> min</textarea></div>
	<span class="titleIndex3">Director/es:</span><div  id="divData"><textarea rows="1" cols="80" readonly="readonly"  id="dir" name="dir_area" style="overflow:hidden"><? echo utf8_encode($row["director"]) ?></textarea></div>
	<span class="titleIndex3">Elenco:</span><div  id="divData"><textarea rows="3" cols="85" readonly="readonly"  id="cast" name="cast_area" style="overflow:hidden"><? echo utf8_encode($row["elenco"]) ?></textarea></div>
	<span class="titleIndex3">Genero:</span><div  id="divData"><textarea rows="1" cols="80" readonly="readonly"  id="genre" name="genre_area" style="overflow:hidden"><? echo $row["genero"] ?></textarea></div>
	<span class="titleIndex3">A&ntilde;o:</span><div  id="divData"><textarea rows="1" cols="85" readonly="readonly"  id="yea" name="yea_area" style="overflow:hidden"><? echo $row["yea"] ?></textarea></div>
	<span class="titleIndex3">Ranking: </span><div  id="divData"><textarea rows="1" cols="80" readonly="readonly"  id="rank" name="rank_area" style="overflow:hidden"><? echo $row["rank"] ?></textarea></div>
	
	</div>
<!-- div data -->
</form>
</div>
<!-- div principal -->

<div id="thumb_content"><img src="<? echo "http://localhost/movies_ci/".$row["img"] ?>" title="Click para cerrar" /></div>
<?
}
?>
</body>
</html>