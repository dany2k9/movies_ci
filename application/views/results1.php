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