<?php
require './API/functions.php';
session_start();
if((!$_SESSION['ID']>0)||(!verify(1,$_SESSION['ID']))){
header("Location: /LogIn.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link href="/css/estils.css" rel="stylesheet" type="text/css">
<title>Add a workshop | Tallers d&#x27;ESOCreanova</title>
<link href='/css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css' rel='stylesheet' type='text/css'>
<link href='/css/bootstrap/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script type='text/js' language='JavaScript' src='js/bootstrap.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><style>
</style>
</head>
<body class='inici'>
<?php include_once('nav.php'); ?>
<div class='box box-white'>
<h2>Tauler de configuraci&oacute;</h2>
<form autocomplete="off" method="Post" action="./result.php">
<input type="hidden" name="operation" value="Update">
<p>Aqu&iacute; pots cambiar la configuraci&oacute; del teu compte</p>
<br>
<div class="form-group has-feedback">
<input type="text" name="newpass" title="Canviar contrasenya" class="form-control"  placeholder="Canviar contrasenya">
<i class="fa fa-lock form-control-feedback"></i>
</div>
<div class="form-group">
Canviar l&#x27;idioma
<select class="form-control" name="lang">
		<option value="ca">Català</option>
		<option value="es">Español</option>
		<option value="en">English</option>
	</select>
</div>
<div style="position:relative" id="log-in-buttons">
<button id="SUBMIT" type="SUBMIT" title="Save" class="btn">
<i class="fa fa-edit"></i>
Save
</button>
<button class="btn" title="Reset to default" type="RESET">
<i class="fas fa-eraser"></i>
Reset
</button>
</div>
</form>
</div>
</body>
</html>

