<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Movies 2k11</title>
	<link href="<?php echo base_url()?>lib/estilo_min.css" type="text/css" rel="stylesheet" />
	<script src="<?php echo base_url()?>lib/jquery-1.5.1.min.js"></script>
	<script src="<?php echo base_url()?>lib/functions.js"></script>
    <script src="<?php echo base_url()?>lib/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>lib/js/Ed_Gein_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
			Cufon.replace('span,a,h2, #name, #name2, b',{
				textShadow: '0px 0px 1px #ffffff'
			});
	</script>
</head>
<body>
<div id="data"></div>
<div id="page_wrapper">

<div class='index_body'>

		
		<div id='logo'>
            <a href='movies.php' title='Ver Movies'><img src='<?php echo base_url(); ?>images/clapboard.png' alt='logo' /></a>
		    <!--<a href='movies.php' title='Ver Movies'><img src='<?php echo base_url(); ?>images/Movie_logo.png' alt='logo' /></a>-->
            <div id='name'><?php echo $total ?></div>
            <div id='name2'><?php echo $username ?></div>
		</div>


		<?php
    echo "<div style='float: left;margin-top: 18px;margin-bottom: 20px;height: 12px'>";
        $cinco = 25;
        $veinte = 50;
        $todas = $total;

        if($total > 25)
        {
        ?>
        <br />
            <?php
            echo anchor('movies/display?limit='.$todas, 'Todas', array('title' => 'Ver Todas'));
            echo "&nbsp;&nbsp;&nbsp;";
            echo anchor('movies/display?limit='.$cinco, '25', array('title' => 'Ver Veinticinco'));
            echo "&nbsp;&nbsp;&nbsp;";
        }if($total > 50)
        {
        echo anchor('movies/display?limit='.$veinte, '50', array('title' => 'Ver Cincuenta'));
        }else
        {
        echo "";
        }
    echo "</div>";

		echo "<div id='info2'>";       //-----------------------div info + botones funciones
			/*echo "<span class='titleIndex' >Cantidad de Movies: ".$total."</span><br />";
			echo "<span class='titleIndex' >Estas logueado como: ".$username." </span><br />";*/

			/*echo "<a href='buscador.php' class='titleIndex2' title='Buscar Movie en la Base de Datos'>Buscar</a>&nbsp;&nbsp;&nbsp;";
			echo "<a href='add.php' class='titleIndex2' title='Agregar Manualmente'>Agregar..</a>";*/
			
			echo anchor('movies/add?id1='.$username, 'Agregar Movie', array('class' => 'titleIndex2', 'title' => 'Agregar'));
			//echo form_hidden('username', $username);
			echo "&nbsp;&nbsp;&nbsp;";
			/* echo "<a href='home.php' class='titleIndex2' title='Agregar Movie'>Agregar Movie</a>&nbsp;&nbsp;||&nbsp;&nbsp;"; */
			echo anchor('movies/logout', 'Cerrar Sesion', array('class' => 'titleIndex2', 'title' => 'Cerrar Sesion'));
			echo "&nbsp;&nbsp;&nbsp;";
			/* echo "<a href='close.php' class='titleIndex2' title='Cerrar Sesion'>Cerrar sesion</a>&nbsp;&nbsp;||&nbsp;&nbsp;"; */
			echo anchor('movies/search', 'Buscar', array('class' => 'titleIndex2', 'title' => 'Buscar Movie en la Base de Datos'));
			/* echo "<a href='".base_url()."lib/buscador.php' class='titleIndex2' title='Buscar Movie en la Base de Datos'>Buscar</a>"; */
            echo "&nbsp;&nbsp;&nbsp;";
            echo "<a href='add.php' class='titleIndex2' title='Agregar Manualmente'>Agregar..</a>";

		echo "</div>";                 //-----------------------div info + botones funciones


		?>
        </div>

<br />
<?php


foreach($datos as $dato): ?>
 <? $separar = array(" ", ":", "-", "_", "`", "(", "#", ")", ".", "&", ",", "!", "/", "[", "]"); ?>
	<span id="separador<? echo str_replace($separar, '', substr($dato->titulo, 0 , 6))?>"><a href="#" onclick="return false" onmousedown="javascript:swapContent('<? echo trim($dato->titulo) ?>', '<? echo $username ?>');" onmouseover="tooltip('<? echo trim($dato->titulo)?>');pos(separador<? echo str_replace($separar, '', substr($dato->titulo, 0 , 6))?>, log)" id="linkBtn"><img src= <? echo base_url()."".$dato->img_thumb?> id='thumbIndex'/></a></span>
	

<?php endforeach; ?>


	<!--<?php foreach($datos as $dato): ?>
	<div>
	<?php echo $dato->titulo; ?>
	</div>
	<?php echo $dato->plot; ?>
	<br />
	<?php echo "<img src='".base_url()."/".$dato->img."' id='thumbIndex'/>" ?>
	<?php endforeach; ?>
	<br />-->
	<!--<?php echo anchor('movies/add', 'Agregar') ?>-->
	
	<?php if (strlen($pagination)): ?>
	<div>
		Paginas: <?php echo $pagination; ?>
	</div>
	<?php endif; ?>
</div>
<div id="myDiv">My default content</div>
<div id="log"></div>	
</body>
</html>