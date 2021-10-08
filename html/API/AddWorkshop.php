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
$result = $conn->query("INSERT INTO Tallers (Name, Location, Date, start, end, Teacher, Subject, Level, requires, PLACES, GTancat) VALUES ('".$_POST['name']."', '".$_POST['Location']."', '".$_POST['date']."', '".$_POST['start'].":00', '".$_POST['end'].":00', '".$_POST['teacher']."', '".$_POST['subject']."','".$_POST['level']."','".$_POST['requisits']."','".$_POST['places']."',".$_POST['gruptancat'].")") or die("Error: </h1>$conn->error");
if($_POST['gruptancat']==1){
$resultat = $conn->query("UPDATE Tallers SET People=\"".$_POST['people']."\" WHERE Name='".$_POST['name']."'");
}
mysqli_close($conn);
echo "Tot correcte:
</h1>El taller ".$_POST['name']." s&#x27;ha registrat correctament</div>";
?>
</body>
</html>
