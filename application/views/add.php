<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>:: Movies2k11- Buscador ::</title>
    <link href="<?php echo base_url()?>lib/estilo_min.css" type="text/css" rel="stylesheet" />
	<script src="<?php echo base_url()?>lib/jquery-1.5.1.min.js"></script>
	<script src="<?php echo base_url()?>lib/functions.js"></script>
    <script src="<?php echo base_url()?>lib/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>lib/js/Ed_Gein_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
			Cufon.replace('span,a,h2,p, #name_index,#name2_index',{
				textShadow: '0px 0px 1px #ffffff'
			});
	</script>
</head>
<body>
<div id="page_wrapper">
    <div class='index_body'>


		<div id='logo'>
            <a href='movies.php' title='Ver Movies'><img src='<?php echo base_url(); ?>images/clapboard.png' alt='logo' /></a>
		    <!--<a href='movies.php' title='Ver Movies'><img src='<?php echo base_url(); ?>images/Movie_logo.png' alt='logo' /></a>-->
            <div id='name'><?php /*echo $total */?></div>
            <div id='name2'><?php echo $user_id ?></div>
		</div>
    </div>

    <center>
	<?php echo form_open('movies/results', array('id' => 'logueo', 'name' => 'form')); ?>
		<div>
			<?php echo form_label('<p>Pelicula a buscar: </p>', 'buscar_film'); ?>
			<?php echo form_input('nom', set_value('title'), 'id="buscar_film"'); ?>
			<!--<?php echo form_hidden('id', $user_id); ?>-->
			<!--<?php //print_r($_GET);?>-->
			<br />
			<?php echo form_submit('action', 'Buscar'); ?>
		</div>
	<?php form_close();?>
	</center>

	<br />

	<?php /*
	
	if(isset($movies))
	{
		//echo $user_id;
		//echo form_hidden('id', $user_id);
		for($i = 0;  $i < $category; $i++)
		{
		echo "<div>";
		echo anchor('movies/add_movie?mid='.$movies[$i]["link"], $movies[$i]["text"]);
		echo "</div>";
		//echo "<a href='http://localhost/movies_ci/lib/movie_data.php?mid=".$movies[$i]['link']."'>".$movies[$i]['text']."</a><br />";

		}
	}else
	{
		echo "no hay resultados";
	}
	*/?>
</div>
</body>
</html>