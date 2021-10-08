<?php
$conn = new mysqli("localhost","root","serverCN01","Tallers") or die("error");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT AES_DECRYPT(password, 'serverCN01') as pass, ID FROM USERS WHERE email='".$_POST['email']."'") or die("error");
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){
if($row['pass']==$_POST['pass']){
$_SESSION['ID'] = $row['ID'];
}else{
echo "Contrasenya incorrecte";
}
}
}else{
echo "Email incorrecte";
}
mysqli_close($conn);
?>
