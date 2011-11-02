<?php
/* require_once("class_movies.php");
if($_SESSION["session_video_user_25"])
{
$mov = new Movies();
$mymovies = $mov->get_movies($_SESSION["session_video_user_25"]); */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<link href="estilo.css" type="text/css" rel="stylesheet" />
		<script src="jquery-1.5.1.min.js"></script>
		<script src="jquery.tmpl.js"></script>
		<script src="functions_srch.js"></script>
	<script type="text/javascript">
	/* $(document).ready(function(){
	$("#linkBtn").click(function(){
			$('#myDiv').slideToggle("slow");
		    $('#myDiv').css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFFFCC'});
			$('#data').css({"opacity": "0.85"});
			$("#data").delay(10).fadeIn("slow");
			});

		$("#linkBtn").mouseover(function(){
		$("#log").css({'display': 'block', 'z-index' : '3000', 'background-color': '#FFF'});
		$("#page_wrapper").css({'z-index' : '1000'});
		});
		
			
		$(function(){
			$("#query").live('keyup', function(){
				var data = 'query=' + $(this).val();
					
				$.post('buscador_query.php', data, function(resp){
					$('#productos').empty();
					$('#tmpl_productos').tmpl(resp).appendTo('#productos');
					}, 'json');
				});
			});	
	});
	

	function swapContent(cv){
		$('#myDiv').html("Loading.gif").show();
		var url = "http://localhost/movies_ci/lib/detalle.php";
		$.post(url, {idVar : cv }, function(data){
			$('#myDiv').html(data).show();
		});
	} 
	
	function reloadPage()
	   {
	   window.location.reload()
	   } */
 </script>
 
		<script id="tmpl_results" type="text/x-jquery-tmpl">
				{{if id_movie}}
				
				<a href='#' onclick='return false' onmousedown='javascript:swapContent("${titulo}");' id='linkBtn' onblur='reloadPage()'><img src='http://localhost/movies_ci/${img_thumb}' title='${titulo}'/></a>		
				
				{{else}}
				<div>No existen resultados</div>
				{{/if}}
				
		</script>
		<title>:: Movies2k11 - Buscador::</title>
	</head>
	<body>
	<div id='page_wrapper'>
		<div id="data"></div>
		<div class='index_body'>
			<div id='logo'>         
				<a href='movies.php' title='Ver Movies'><img src='Movie_logo.png' alt='logo' /></a>
				<div id='name'><?php echo $_SESSION["session_video_user_25"] ?></div>
					  
			</div>
			
			<div id='info'>	
					<h1>Buscar Movie</h1>
					<input type="text" name="query" id="query">
					<div  id="productos" style='width:100%;float:left;margin-top:45px'>
					
					</div>
			</div>		
			<div id="myDiv">My default content</div>
		</div>		
	</div>		
	</body>
</html>
<?php
//}
?>