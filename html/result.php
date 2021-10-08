<?php
session_start();
if((!$_SESSION['ID']>0)||($_POST['operation']!="addworkshop"&&$_POST['operation']!="signup")){
header("Location: /LogIn.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Resultat de la seva operaci&oacute; | Tallers d&#x27;ESOCreanova</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link href="/css/estils.css" rel="stylesheet" type="text/css">
<link href="/css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/js" language="JavaScript" src="js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class='inici'>
<?php
require './API/functions.php';
include_once('/var/www/html/nav.php');
echo "<div class='box'><h2>Benvingut/da ";
$usr = getPeople("ID",$_SESSION['ID'],"firstname,lastname")[0]; echo $usr['firstname']." ".$usr['lastname'].".<br>";
if($_POST['operation']=="signup"){
echo register($_POST);
}elseif($_POST['operation']=="addworkshop"){
echo addworkshop($_POST);
}
echo "<br><a href='/'>P&agrave;gina principal</a> Autom&agrave;ticament se&#x27;t redireccionar&agrave; a la p&agrave;gina principal</div>";
?>
<script>
$(document).ready(function(){ //When the page is loaded
setTimeout(function(){ //Delay for 10 seconds
window.location.href="/"; //Redirect to homepage
}, 10000); //Delay for 10 seconds
});
</script>
</body>
</html>
