<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href="<?php echo base_url()?>css/estilo.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id='page_wrapper'>
	<div class="index_body">
		<div id='logo'>
			<a title='Movies 2k11'><img src='<?php echo base_url()?>/images/Movie_logo.png' alt='logo' /></a>
		</div>

	</div>

	<center>
	<?php echo form_open('movies/logueo', array('id' => 'logueo', 'name' => 'form')); ?>
		<h2 class="titleIndex">Ingrese su nombre de usuario y Password</h2><br /><br />
		<input type="text" name="login" />
		<br />
		<input type="password" name="pass" />
		<br /><br />

		<a href="#" class="titleIndex2" onclick="document.form.submit();" title="Entrar">Entrar</a>

		<br /><br />
		<?php echo anchor('movies/new_user', 'Crear Usuario', array('class' => 'titleIndex2'));?>
		

	<?php form_close(); ?>
	</center>
</div>
</body>
</html>