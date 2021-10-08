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
<title>Sign up | Tallers d&#x27;ESOCreanova</title>
<link href='/css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css' rel='stylesheet' type='text/css'>
<link href='/css/bootstrap/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script type='text/js' language='JavaScript' src='js/bootstrap.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body class='inici'>
<?php include_once('nav.php'); ?>
<div class='box box-white'>
<h2>
Benvingut/da <?php $usr = getPeople("ID",$_SESSION['ID'],"firstname,lastname")[0]; echo $usr['firstname']." ".$usr['lastname']; ?>.
<br>Sign up</h2>
<br>
<br>
<form autocomplete="off" method='Post' action='./result.php'>
<input type="hidden" name="operation" value="signup">
<div class="form-group has-feedback">
<input name='name'required placeholder='Name' type='text' title='Name' class='form-control'>
<span class='fa fa-user form-control-feedback' style='font-weight:400'>
</div>
<div class="form-group has-feedback">
<input required name='surname' type='text' placeholder='Surname' title='Surname' class='form-control'>
<span class='fa fa-user-circle form-control-feedback' style='font-weight:400'>
</div>
<div class="form-group has-feedback">
        <input name='email' type="email" class="form-control" placeholder="ESOCreanova mail" required title="ESOCreanova mail">

        <span class="fa fa-envelope form-control-feedback" style='font-weight:400;'></span>

      </div>
<div class="form-group has-feedback">
<!-- span id='see-Pass' class='fa fa-eye non-display' onclick="$('#pass').addClass('secure-text');"></span -->
        <input name="password" type="password" class="form-control" placeholder="Password" required title="Password">
	<span class="fa fa-lock form-control-feedback"></span>

      </div>
<div class='form-group'>
	<span>Language:</span>
	<select class='form-control' name='lang'>
		<option value='ca'>Catal&agrave;</option>
		<option value='es'>Espa&ntilde;ol</option>
		<option value='en'>English</option>
	</select>
</div>
<div class='form-group'>
<span>Rank:</span>
<select class='form-control' name='rank'>
<option value='0'>Student</option>
<option value='1'>Teacher</option>
</select>
</div>
<div class="form-group">
<span name="level">Level:</span>
<select class='form-control' name='level'>
<option value='PRI6'>6&eacute; de prim&agrave;ria</option>
<option value='ESO1'>1r d&#x27;ESO</option>
<option value='ESO2'>2n d&#x27;ESO</option>
<option value='ESO3'>3r d&#x27;ESO</option>
<option value='ESO4'>4t d&#x27;ESO</option>
<option value='BATX1'>1r de batxillerat</option>
<option value='BATX2'>2n de batxillerat</option>
</select>
</div>
<br>
<div id='log-in-buttons'>
<button type='SUBMIT' title='Sign up' class='btn'>
<i class="fa fa-edit"></i>
Sign up
</button>
<button class='btn btn-danger' title='Reset to default' type='RESET'>
<i class="fas fa-eraser"></i>
Reset
</button>
</div>
</div>
<script>
$("[name='rank']").change(function(e){
$("[name='level']").toggleClass("non-display");
});
</script>
</body>
</html>
