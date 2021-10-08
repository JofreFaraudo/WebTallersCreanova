<?php
session_start();
$conn = new mysqli("localhost", "root", "serverCN01", "Tallers");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
		$users = $conn->query("SELECT PSignedUp FROM Tallers WHERE ID=".$_POST['id']);
		echo $conn->num_rows;
		if($users->num_rows>0){
		$ids = "";
		while($row = $users->fetch_assoc()){
			$ids.=$row['PSignedUp'].",";
		}
		}else{
                die("Detalls: No s'ha trobat el taller");
		}
		if($ids==","){$ids="";}
		if(!$conn->query("UPDATE Tallers SET PSignedUp='".$ids.$_SESSION['ID']."' WHERE ID = ".$_POST['id'])===TRUE){die("Detalls:".$conn->error);}
$conn->close();
die("ok");
?>
