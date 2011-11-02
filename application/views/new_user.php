<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Add User</title>
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
	<?php echo form_open('movies/add_user', array('id' => 'logueo', 'name' => 'form')); ?>
		<h2 class="titleIndex">Ingrese sus datos</h2><br /><br />
		<p>Nombre: </p><?php echo form_input('login');?>
		<br />
		<p>Password: </p><?php echo form_password('pass');?>
		<br /><br />
		<a href="#" class="titleIndex2" onclick="document.form.submit();" title="Agregar">Agregar</a>
	<?php form_close(); ?>
	<?php echo validation_errors('<p class="error">') ?>
	</center>
	
</div>	
</body>
</html>