<?php
function verify($type, $id){
$conn = new mysqli("localhost","root","serverCN01","Tallers") or die("error");
if ($conn->connect_error) {
    return "Connection failed: " . $conn->connect_error;
}
$result = $conn->query("SELECT * FROM USERS WHERE ISTEACHER=".$type." AND ID=".$id) or die("error");
mysqli_close($conn);
return $result->num_rows>0;
}
function addworkshop($values){
$conn = new mysqli("localhost", "root", "serverCN01", 'Tallers');
if($conn->connect_error){
return "error";
}
if(!$conn->query("INSERT INTO Tallers (Name, Location, Date, start, end, Teacher, Subject, Level, requires, PLACES, GTancat) VALUES ('".$values['name']."', '".$values['Location']."', '".$values['date']."', '".$values['start'].":00', '".$values['end'].":00', '".$values['teacher']."', '".$values['subject']."','".$values['level']."','".$values['requisits']."','".$values['places']."',".$values['gruptancat'].")")===TRUE){
return "Error:</h2>".$conn->error;
}
if($values['gruptancat']==1){
if(!$conn->query("UPDATE Tallers SET People=\"".$values['people']."\" WHERE Name='".$values['name']."'")===TRUE){
return "Error:</h2>".$conn->error;
}
}
mysqli_close($conn);
return "Tot correcte:</h2>El taller ".$values['name']." s&#x27;ha registrat correctament";
}
function register($values){
$conn = new mysqli("localhost", "root", "serverCN01", 'Tallers'); 
if($conn->connect_error){
return "Error:</h2>";
}
if(!$conn->query("INSERT INTO USERS (firstname, lastname, email, password, LANG, ISTEACHER, LEVEL) VALUES ('".$values['name']."', '".$values['surname']."', '".$values['email']."', AES_encrypt('".$values['password']."', 'serverCN01'), '".$values['lang']."', ".$values['rank'].", '".$values['level']."')")===TRUE){
return "Error</h2>".$conn->error;
}
mysqli_close($conn);
return "Tot correcte:</h2>L&#x27;usuari ".$values['name']." s&#x27;ha registrat correctament";
}
function getPeople($key,$value,$cols){
$conn = new mysqli("localhost", "root", "serverCN01", 'Tallers'); 
if($conn->connect_error){
return "Error";
}
$result = $conn->query("SELECT ".$cols." FROM USERS WHERE ".$key."=".$value);
$output = [];
while($row = $result->fetch_assoc()){
	array_push($output,$row);
}
$conn->close();
return $output;
}
?>
