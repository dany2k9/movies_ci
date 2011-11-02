<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Movies 2k11</title>
	<link href="<?php echo base_url()?>lib/estilo.css" type="text/css" rel="stylesheet" />
	<script src="<?php echo base_url()?>lib/jquery-1.5.1.min.js"></script>
	<script src="<?php echo base_url()?>lib/functions.js"></script>
	<script type="text/javascript">
	var base_url = "<?php echo base_url();?>";
	</script>
</head>
<body>
<div id="data"></div>
<div id="page_wrapper">

<!--<?php echo "Total de Movies: ".$total."<br />"; ?>-->
<div class='index_body'>

		
		<div id='logo'>         
					<a href='movies.php' title='Ver Movies'><img src='<?php echo base_url(); ?>images/Movie_logo.png' alt='logo' /></a>	 
			<div id='name'><?php echo $username ?></div>			
		</div>
		
		<?php
		echo "<div id='info'>";       //-----------------------div info + botones funciones
			echo "<span class='titleIndex' >Cantidad de Movies: ".$total."</span><br />";
			echo "<span class='titleIndex' >Estas logueado como:" .$username . "</span><br />";

			
			echo anchor('movies/add', 'Agregar Movie', array('class' => 'titleIndex2', 'title' => 'Agregar'));
			echo "&nbsp;&nbsp;||&nbsp;&nbsp";
			/* echo "<a href='home.php' class='titleIndex2' title='Agregar Movie'>Agregar Movie</a>&nbsp;&nbsp;||&nbsp;&nbsp;"; */
			echo anchor('movies/logout', 'Cerrar Sesion', array('class' => 'titleIndex2', 'title' => 'Cerrar Sesion'));
			echo "&nbsp;&nbsp;||&nbsp;&nbsp";
			/* echo "<a href='close.php' class='titleIndex2' title='Cerrar Sesion'>Cerrar sesion</a>&nbsp;&nbsp;||&nbsp;&nbsp;"; */
			echo anchor('movies/search', 'Buscar', array('class' => 'titleIndex2', 'title' => 'Buscar Movie en la Base de Datos'));
			/* echo "<a href='".base_url()."lib/buscador.php' class='titleIndex2' title='Buscar Movie en la Base de Datos'>Buscar</a>"; */

		echo "</div>";                 //-----------------------div info + botones funciones
		?>
</div>


<?php foreach($datos as $dato): ?>
 <? $separar = array(" ", ":", "-", "_"); ?>
<!--<?php echo form_open('movies/details', array('id' => 'test3', 'name' => 'form')); ?>-->
 <?php 
 /* echo form_hidden('id_movie', trim($dato->id_movie));
  echo form_hidden('titulo', trim($dato->titulo)); */ ?>
  
<input type="hidden" id="id_movies" name="id_movies" value="<?php echo trim($dato->id_movie)?>"/>

	<span id="separador<? echo str_replace($separar, '', substr($dato->titulo, 0 , 6))?>"><!--<a href="#" onclick="return false" onmousedown="javascript:swapContent('<? echo trim($dato->titulo) ?>');" onmouseover="tooltip('<? echo trim($dato->titulo)?>');pos(separador<? echo str_replace($separar, '', substr($dato->titulo, 0 , 6))?>, log)" id="linkBtn"><img src= <? echo base_url()."".$dato->img_thumb?> /></a>-->
	

  <?php  //echo anchor('#', '<img src="'.base_url()."".$dato->img_thumb.'" />', array('onclick' => 'document.form.submit();', 'onmousedown' => 'javascript:swapContent('.trim($dato->titulo).');', 'onmouseover' => 'tooltip('.trim($dato->titulo).');', 'id' => 'linkBtn' )); ?>
 
<!--<a href="#" onclick="document.form.submit();" title="<? echo trim($dato->titulo)?>" id="linkBtn"><img src= <? echo base_url()."".$dato->img_thumb?> id="linkBtn"/></a>-->

<?php echo anchor('#', '<img src="'.base_url()."".$dato->img_thumb. '"/>', array('title' => trim($dato->titulo), 'id' => trim($dato->id_movie), 'value' => 'yo')); ?>

</span>
<script type="text/javascript">
var titulo_movie = "<?php echo trim($dato->titulo); ?>";
var movie_id = "<?php echo $dato->id_movie; ?>";

</script>		
 <!--<?php form_close(); ?>-->



<?php endforeach; ?>



	<!--<?php foreach($datos as $dato): ?>
	<div>
	<?php echo $dato->titulo; ?>
	</div>
	<?php echo $dato->plot; ?>
	<br />
	<?php echo "<img src='".base_url()."/".$dato->img."'/>" ?>
	<?php endforeach; ?>
	<br />-->
	<!--<?php echo anchor('movies/add', 'Agregar') ?>-->
	
	<?php if (strlen($pagination)): ?>
	<div>
		Paginas: <?php echo $pagination; ?>
	</div>
	<?php endif; ?>
</div>
	
<div id="myDiv">My default contents</div>
<div id="log"></div>

</body>
</html>