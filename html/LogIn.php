<?php
session_start();
if($_SESSION['ID']>0){
header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="<?php $lang= $_GET['lang']; if($lang == 'es' || $lang == 'en'){echo $lang;}else{echo 'ca';} ?>">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<meta name="description" content="Iniciar sessi&oacute; als tallers d'ESOCreanova">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Iniciar sessi&oacute; | Tallers d'ESO Creanova</title>
<link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.min.css">
<link rel="icon" href='/Images/logoclau.png'>
<link href="/css/estils.css" rel="stylesheet" type="text/css">
<link href="/css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css">
</head>
<body class='iniciarsessio'>
<!-- Language -->
<div class='center languages'>
<!-- Catalan -->
<div class='new-language <?php if($lang !== 'es' && $lang !== 'en'){echo 'non-display';} ?>'>
<i class='fa fa-globe'></i> <span>Aquest lloc est&agrave; disponible en</span> <a href='<?php echo $_SERVER['PHP_SELF']; ?>' title='Mostrar aquest lloc en catal&agrave;'>Catal&agrave;</a>
</div>
<!-- Spanish -->
<div class='new-language <?php if($lang == 'es'){echo 'non-display';} ?>'>
<i class='fa fa-globe'></i> <span>Este sitio esta disponible en</span> <a title='Mostrar este sitio en espa&ntilde;ol' href='?lang=es'>Espa&ntilde;ol</a>
</div>
<!-- English -->
<div class='new-language <?php if($lang == 'en'){echo 'non-display';} ?>'>
<i class='fa fa-globe'></i> <span>This site is avaliable in</span> <a href='?lang=en' title='Show this site in english'>English</a>
</div>
</div>
<!-- content -->
<div class='iniciarsessio' id="mostra">
<h1><?php if($lang=='es'){echo 'Iniciar sesi&oacute;n';}elseif($lang=='en'){echo'Log in';}else{echo 'Iniciar sessi&oacute;';} ?></h1>
<?php
if($_GET['action']=="logout"){
include_once("API/CloseSession.php");
}else{
if(sizeof($_POST)>0){
  echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">";
  include_once("./API/LogIn.php");
  echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>";
if($_SESSION['ID']>0){
header("Location: /");
}
}else{
echo "<br><br>";
}
}
?>
<form method='Post' action='./LogIn.php'>
<div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="<?php if($lang == 'es'){echo 'Correo de ESOCreanova';}elseif($lang == 'en'){echo 'ESOCreanova mail';}else{echo "Correu d'esocreanova";} ?>" required title="<?php if($lang == 'es'){echo 'Correo de ESOCreanova';}elseif($lang == 'en'){echo 'ESOCreanova mail';}else{echo "Correu d'esocreanova";} ?>">


        <span class="fa fa-user form-control-feedback" style='font-weight:400;'></span>

      </div>
<br>
<div class="form-group has-feedback">
<!--span id='see-Pass' class='fa fa-eye non-display' onclick="$('#pass').addClass('secure-text');"></span-->
        <input type="password" name="pass" id='pass' class="form-control" placeholder="<?php if($lang == 'es'){echo 'Contrase&ntilde;a';}elseif($lang == 'en'){echo 'Password';}else{echo 'Contrasenya';} ?>" required title="<?php if($lang == 'es'){echo 'Contrase&ntilde;a';}elseif($lang == 'en'){echo 'Password';}else{echo 'Contrasenya';} ?>">

        <span class="fa fa-key form-control-feedback"></span>

      </div>
<br>
<div id='log-in-buttons'>
<button type='SUBMIT' title='<?php if($lang == 'en'){echo 'Log in';}else{echo 'Entrar';} ?>' class='btn'>
<i class="fas fa-sign-in-alt"></i>
<?php if($lang == 'en'){echo 'Log in';}else{echo 'Entrar';} ?>
</button>
<button class='btn btn-danger' title='<?php if($lang =='es'){echo 'Borrar datos';}elseif($lang == 'en'){echo 'Reset to defautl';}else{echo 'Borrar dades';} ?>' type='RESET'>
<i class="fas fa-eraser"></i>
<?php if($lang =='es'){echo 'Borrar datos';}elseif($lang == 'en'){echo 'Reset';}else{echo 'Borrar dades';} ?>
</button>
</div>
<br>
<br>
<button type="button" class='a Malasort' title='<?php if($lang=='es'){echo 'Recuperar contrase&ntilde;a';}elseif($lang=='en'){echo 'Recover password';}else{echo 'Recuperar contrasenya';} ?>'>
<i class="fa fa-user-times"></i>
<?php if($lang=='es'){echo 'Olvid&eacute; la contrase&ntilde;a';}elseif($lang=='en'){echo 'I forgot my password';}else{echo 'He oblidat la contrasenya';} ?>
</button>
</form>
</div>
<div id="ocult" class='iniciarsessio non-display'>
<h1><?php if($lang=='es'){echo "Recuperar contrase&ntilde;a:";}elseif($lang=='en'){echo "Recover password:";}else{echo "Recuperar contrasenya:";} ?></h1><br>
    <p><?php if($lang=="es"){echo "Introduzca su correo electr&oacute;nico aqu&iacute; para recibir su nueva contrase&ntilde;a";}elseif($lang=="en"){echo "Type your email here for receive your new password";}else{echo "Introdueixi aqu&iacute; el seu correu electr&ograve;nic per a rebre la nova contrasenya";} ?></p>
    <div class="form-group has-feedback has-submit">
	<input type="email" id="recover-pass" placeholder="<?php if($lang=="es"){echo "Correo electr&oacute;nico";}elseif($lang=="en"){echo "Email";}else{echo "Correu electr&ograve;nic";} ?>" title="<?php if($lang=="es"){echo "Correo electr&oacute;nico";}elseif($lang=="en"){echo "Email";}else{echo "Correu electr&ograve;nic";} ?>" class="form-control">
	<span class="far fa-envelope form-control-feedback"></span>
	<button id="send-mail" class="btn submitbtn">
	     <?php if($lang=="en"){echo "Submit";}
		   else{echo "Enviar";}
	     ?>
	</button>
    </div>
    <button title='<?php if($lang=='es'){echo "Volver al inicio de sesi&oacute;n";}elseif($lang=='en'){echo "Return to log in";}else{echo "Tornar a l&#x27;inici de sessi&oacute;";} ?>' class='a Malasort'><i class="fas fa-arrow-circle-left"></i> <?php if($lang=='es'){echo 'Volver';}elseif($lang=='en'){echo 'Return';}else{echo 'Retornar';} ?></button>
</div>
<footer class='footer'>
<a href="/LogIn.php">Catal&agrave;</a>
<a href="?lang=es">Espa&ntilde;ol</a>
<a href="?lang=en">English</a>
</footer>
<!-- script>
var navigator = navigator.userAgent;
alert(navigator);
if(navigator.indexOf('Chrome') != -1 || navigator.indexOf('Safari') != -1){
$('#see-Pass').removeClass('non-display');
}
</script -->
<script>
$("button.Malasort").click(function(){
$("#mostra, #ocult").toggleClass("non-display");
});
$("#send-mail").click(function (e){
$.post("<?php echo $_SERVER['SERVER_ADDR']; ?>:8080", {lang:$("html").attr("lang"),email:$("#recover-pass").val()}, function (data){
alert(data);
});
});
</script>
</body></html>
