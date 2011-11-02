<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php echo form_open('movies/add'); ?>
		<div>
			<?php echo form_label('Movie a buscar:', 'title'); ?>
			<?php echo form_input('nom', set_value('title'), 'id="title"'); ?>
			<!--<?php echo form_hidden('id', $_GET['id1']); ?>-->
			<!--<?php print_r($_GET);?>-->
			<br />
			<?php echo form_submit('action', 'Buscar'); ?>
		</div>
	<?php form_close();?>
	
	
	<br />

	<?php 
	
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
	?>
</body>
</html>