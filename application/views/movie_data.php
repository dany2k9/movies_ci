<?php 
include_once FCPATH.'/lib/class.php';
//require_once("class.php");
$sql = "SELECT DISTINCT disco FROM ".$user." WHERE disco IS NOT NULL and disco != 0 order by disco asc";
$res = mysql_query($sql, Conectar::con());
?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<script src="<?php echo base_url()?>js/jquery-1.5.1.min.js"></script>
	<link href="<?php echo base_url()?>lib/estilo.css" type="text/css" rel="stylesheet" />
	<title>Detalle </title>
	<script type="text/javascript">
		$(document).ready(function(){
		$("#plot_data, #dir_data, #cast_data, #genre_data, #year_data, #tit, #rank_data, #length_data").css({'background-color': '#FFF', 'border': '0', 'color': '#336699', 'font-size' : '12px', 'overflow' : 'hidden'});
		
		$("#search_img").click(function(mievento){
			mievento.preventDefault();
			var test = $("#tit").val();

			$("#miload").html("<iframe src='http://www.google.com.ar/images?q=" + test + "' frameborder='0' width='280' height='320'>");
		});
		$("#link").click(function(mievento){
			mievento.preventDefault();
			var test2 = $("#var1").val();
			$("#miload").html("<iframe src='" + test2 + "' frameborder='0' width='280' height='320'>");
		});
		
		$('#newDisc').click(function(){
			$(this).css('display', 'none');
			$('#existDisc').css('display', 'none');
			$('#newDiscVal').css('visibility', 'visible');
			$('#disco').attr('name', '');
			$('#newDiscVal input').attr('name', 'disctextarea');
			});

		});
		
	</script>	
	</head>
	<body>

<?php
include_once APPPATH.'/libraries/simple_html_dom.php';
//include_once('simple_html_dom.php');
//print_r($_POST);
//print_r($_GET);
// Create DOM from URL or file
$html = file_get_html('http://www.filmaffinity.com'. $mid);

echo "<div id='page_wrapper'>";


//imagen
foreach($html->find("a[class='lightbox']") as $img);
{
	echo "<div style='float:right;margin-right:20%;margin-top:4%'>";
	if(isset($img->href))
	{
	echo "<img src='".$img->href."' id='ima_data' name='ima' width='150px' height='215'/>";
	}else
	{
	echo "<div style='float:right;margin-right:-150px;margin-top:15%;'>";
	echo "sin imagen<br />";
	?>
	<input type="file" name="img" id="" /><br />
	<a href="#" id="search_img">Buscar</a>
	<div id="miload"></div>
	<!--<iframe id="second" src="http://www.google.com.ar/imghp?hl=es&tab=wi" frameborder="0" width="280" height="390">-->
	<a href="#" id="link">FilmAffinity</a>
	<?
	
	echo "</div>";
	}
	echo "</div>";
?>
		
		<!--<form method='post' action='insert.php?ima=<?php echo $img->href?>'>-->
		<?php 
		
		$ima = array('ima' => $img->href);
		echo form_open('movies/added', '', $ima); ?>
<?	
}
//imagen
?> <textarea id="var1" style="display:none;">http://www.filmaffinity.com<? echo $mid ?></textarea> <?

//toda la data menos el ranking
foreach($html->find("table[valign=baseline]") as $item);
{
    $text =$item->parent();
		
		$cadena= $text->plaintext;
		

		echo "<div style='float:left;width:50%'>";    //inicio del div con la data
		
		//titulo
		$tit = preg_split('(T�TULO ORIGINAL)' ,$cadena);
		$new_tit = preg_split('(A�O)', $tit[1]);
        $clean_tit = substr($new_tit[0], 13, -1);
		echo "<b class='title' >Titulo Original:</b>&nbsp;&nbsp;<input type=text id='tit' name='tit' readonly='readonly' value='".$clean_tit."' style='width:300px' /><br />";
		//titulo
		
		
		
		//plot
		$Lines = preg_split('(SINOPSIS)' ,$cadena);
		$new_line = preg_split('(FILMAFFINITY)', $Lines[1]);
        $clean = substr($new_line[0], 13, -1);
		echo "<b class='title' >Plot:</b><textarea name='plot' id='plot_data' cols='75' rows='12' readonly='readonly'>".$clean."</textarea>";
		//plot
		
//-------------------------------------------------------------------------		
		//length
 		$length = preg_split('(DURACI�N)' ,$cadena);
		
		//echo $length[1];
		$new_length = preg_split('(min)', $length[1]);
		//echo $new_length[0];
		//echo $new_length2[0];
		
        $clean_length = substr($new_length[0], 35, -1);
		echo "<b class='title' >Duracion:</b>&nbsp;&nbsp;<input type=text id='length_data' name='length' readonly='readonly' value='".$clean_length."'/><br />";	
		
		//length
//-------------------------------------------------------------------------	

	
		//director
		$dir = preg_split('(DIRECTOR)' ,$cadena);
		$new_dir = preg_split('(GUI�N)', $dir[1]);
        $clean_dir = substr($new_dir[0], 13, -1);
		
		echo "<b class='title' >Directors:</b><textarea name='dir' id='dir_data' cols='75' rows='3' readonly='readonly'>".$clean_dir." </textarea><br />";
		//director
		
		//cast
		$cast = preg_split('(REPARTO)' ,$cadena);
		$new_cast = preg_split('(PRODUCTORA)', $cast[1]);
        $clean_cast = substr($new_cast[0], 12);
		$text_cast = preg_replace('#  #', ' ', $clean_cast);

		echo "<b class='title' >Cast:</b><textarea name='cast' id='cast_data' cols='75' rows='4' readonly='readonly'>".$text_cast."</textarea><br />";


		//cast
		
		//genre
		$genre = preg_split('(G�NERO)' ,$cadena);
		$new_genre = preg_split('(\||SINOPSIS)', $genre[1]);
        $clean_genre = substr($new_genre[0], 2, 120);
		
		$text = preg_replace('#[�]#', 'o', $clean_genre);
		$text = preg_replace('#[�]#', 'a', $text);
		$text = preg_replace('#[�]#', 'i', $text);
		$text = preg_replace('#[^-a-zA-Z0-9�_.]#', '-', $text);
		$text = trim($text);
		$text = preg_replace('#[-_]+#', ' ', $text);
		
		//$genre_clean = ereg_replace("[^A-Za-z������������@\&nbsp;]", "&nbsp;", $clean_genre);
		
		//$cadena_genre = str_replace("&nbsp;&nbsp;&nbsp;&nbsp;","", $genre_clean);
			
		//echo $cadena;
		
		$genre_to_view = substr($text, 1, -1);
		
		echo "<b class='title' >Genero:</b><textarea name='genre' id='genre_data' cols='75' rows='2' readonly='readonly'>".$genre_to_view."</textarea><br />";
		//genre
		
		//year
		$year = preg_split('(A�O)' ,$cadena);
		$new_year = preg_split('(DURACI�N)', $year[1]);
		$year = preg_split('(Ver trailer externo)', $new_year[0]);
        $clean_year = substr($year[0], 0);
		
		//$year_clean = ereg_replace("[^0-9\.\,&quot;:&nbsp]", "", $clean_year);
		
		echo "<b class='title' >A�o:</b>&nbsp;&nbsp;<input type=text id='year_data' name='year' readonly='readonly' value='".trim($clean_year)."'/>";
		//year
		echo "</div>";       //fin del div con la data
	}
	
//toda la data menos el ranking

	
//ranking	
	echo "<div style='clear:left;margin-bottom:-6.3%'>";   //inicio del div del ranking	
	echo "<b class='title' >Rank:</b>";
	foreach($html->find("td[Style]") as $rank) 
	{
	$items['ranking'] = $rank->plaintext;
	
	$ranks[] = $items;
	
	echo "</div>";                    //fin del div del ranking	
	
	}

	echo "<input type=text id='rank_data' name='rank' readonly='readonly' value='".$ranks[1]['ranking']."' style='margin-left:5%'/>";

//ranking
	

	echo "<br />";
	?><!-- <input type="hidden" name="user" value="<? echo $_GET["id"]?>"/> --><?php 
	
	if (isset($_POST['disctextarea']))
	{
	?>
		<label for="disctextarea">
	<?php
		echo $_POST['disctextarea']
	?>
		</label>

	<?php
	}

	echo "<div id='existDisc'>";
	echo "<b class='title' >Disco:</b>&nbsp;&nbsp;";

	echo "<select name='disctextarea' id='disco'>";
	while($row=mysql_fetch_array($res))
	{
			echo "<option value='".$row['disco']."'>".$row['disco']."</option>";
	}
	echo "</select>";
	echo "</div>";

	//echo "<div id='newDisc'>&nbsp;<a href='#' class='titleIndex2'>Nuevo Disco</a></div><div id='newDiscVal'><b class='title' >Disco:</b>&nbsp;&nbsp;<input type='text' size='2' maxlength='3'/></div>";
	echo "<div id='newDisc'>";
	
	echo anchor('#', 'Nuevo Disco', array('onclick' => 'return false', 'class' => 'titleIndex2'));
	echo "</div>";
	
	echo "<div id='newDiscVal' style='visibility:hidden'>";
	echo "<b class='title' >Disco:</b>";
	echo "<input type='text' size='2' maxlength='3'/>";
	echo "</div>";
	
	//echo "<input type='submit' value='Agregar'/>";
	echo form_submit('add', 'Agregar');
	echo form_close();
	//echo "</form><br />";
	//echo $_GET["id"];
?>
<div style='float:right;width:180px;margin-right:10%;margin-top:-19%'>
	  <a href='movies.php' title='Ver Movies'><img src='<?php echo base_url()?>images/Movie_logo.png' alt='logo' width="80px" height="80px"/></a>
</div>
</div>	
</body>
</html>
