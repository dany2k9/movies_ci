<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href="<?php echo base_url()?>lib/estilo_min.css" type="text/css" rel="stylesheet" />
    <script src="<?php echo base_url()?>lib/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>lib/js/Ed_Gein_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
			Cufon.replace('span,a,h2',{
				textShadow: '0px 0px 1px #ffffff'
			});
	</script>
</head>
<body>
	<div id='page_wrapper'>
	<div class="index_body">
		<div id='logo'>
			<a title='Movies 2k11'><img src='<?php echo base_url()?>/images/clapboard2.png' alt='logo' /></a>
		</div>

	</div>

	<center>
	<?php echo form_open('movies/logueo', array('id' => 'logueo', 'name' => 'form')); ?>
		<h2 class="titleIndex">Ingrese su nombre de usuario</h2><br />
		<input type="text" name="login" />
		<br />
		<input type="password" name="pass" />
		<br />

		<a href="#" class="titleIndex2" onclick="document.form.submit();" title="Entrar">Entrar</a>

		<br />
		<?php echo anchor('movies/new_users', 'Crear Usuario', array('class' => 'titleIndex2'));?>
		

	<?php form_close(); ?>
	</center>
</div>
</body>
</html>