<!DOCTYPE html>
<html>
<head>
<title>Resultat de registrar usaris | Tallers d&#x27;ESOCreanova</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link href="/css/estils.css" rel="stylesheet" type="text/css">
<link href="/css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/js" language="JavaScript" src="js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class='inici'>
<?php
include_once('/var/www/html/components/MenuBar.php');
echo "<div class='box'><h1>";
$conn = new mysqli("localhost", "root", "serverCN01", 'Tallers') or die("error");
if($conn->connect_error){
die("error");
}
$result = $conn->query("INSERT INTO USERS (firstname, lastname, email, password, LANG, ISTEACHER, LEVEL) VALUES ('".$_POST['name']."', '".$_POST['surname']."', '".$_POST['email']."', AES_encrypt('".$_POST['password']."', 'serverCN01'), '".$_POST['lang']."', ".$_POST['rank'].", '".$_POST['level']."')") or die("Error: </h1>$conn->error");
mysqli_close($conn);
echo "Tot correcte:
</h1>L&#x27;usuari ".$_POST['name']." s&#x27;ha registrat correctament</div>";
?>
</body>
</html>
