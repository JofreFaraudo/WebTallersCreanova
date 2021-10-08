<?php
session_start();
if(!$_SESSION['ID']>0){
header("Location: LogIn.php");
}
require "./API/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link href="/css/estils.css" rel="stylesheet" type="text/css">
<title>Apunta&#x27;t aqu&iacute; als tallers | Tallers d&#x27;ESOCreanova</title>
<link rel='icon' href='../Images/logo-creanova.png'>
<link href='/css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.css' rel='stylesheet' type='text/css'>
<link href='/css/bootstrap/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script type='text/javascript' language='JavaScript' src='js/bootstrap.min.js'></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script type="text/javascript" src="js/Pestanyes.js"></script>
<style>
div[id^="cpestanya"]{
padding: 5px 10px;
width: 100%;
}
#pestanyes {
    float: top;
    font-size: 3ex;
    font-weight: bold;
}
#pestanyes ul{
    margin-left: -40px;
}
#pestanyes li{
    list-style-type: none;
    float: left;
    text-align: center;
    margin: 0px 2px -2px -0px;
    background: darkgrey;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border: 2px solid bisque;
    border-bottom: dimgray;
    padding: 0 20px;
    text-decoration: none;
    color: bisque;
    cursor: pointer;
}
#pestanyes li:hover{
text-decoration: underline;
}
#contingutpestanyes{
    clear: both;
    background: dimgray;
    padding: 20px 0px 20px 20px;
    border-radius: 5px;
    border-top-left-radius: 0px;
    border: 2px solid bisque;
}
</style>
    </head>
    <body class='inici' onload="javascript:canviarPestanya(pestanyes,pestanya0);">
<?php include_once('nav.php'); ?>
        <div class="box">
	<h2>
	Benvingut/da <?php $usr = getPeople("ID",$_SESSION['ID'],"firstname,lastname")[0]; echo $usr['firstname']." ".$usr['lastname']; ?>.
            <br>A continuaci&oacute;, pot apuntar-se als tallers pitjant el bot&oacute; &#x22;Apunta&#x27;m&#x22;</h2>
	    <?php
            echo "<div id='pestanyes'><ul id='llista-pestanyes'>";
	    $conn = new mysqli("localhost", "root", "serverCN01", "Tallers");
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$result = $conn->query("SELECT Date FROM Tallers") or die("error");
		if ($result->num_rows > 0) {
                    $i = 0;
		    $DatesSelected = [];
		    while($row = $result->fetch_assoc()) {
			if(!in_array($row['Date'],$DatesSelected)){
			array_push($DatesSelected,$row['Date']);
			$cdate = explode("-",$row['Date']);
			echo "<li id='pestanya".$i."' onclick='canviarPestanya(pestanyes,pestanya".$i.");'>".$cdate[2]."/".$cdate[1]."/".$cdate[0]."</li>";
			$i=$i+1;
			}
		    }
            echo "</ul></div><div id='contingutpestanyes'>";
		    $i = 0;
		$result = $conn->query("SELECT Date FROM Tallers") or die("error");
		    $DatesSelected = [];
		    while($row = $result->fetch_assoc()) {
			if(!in_array($row['Date'],$DatesSelected)){
			array_push($DatesSelected,$row['Date']);
			echo "<div id='cpestanya".$i."'><table class='collapse-border-table table-stripped'><thead><tr><th>Nom</th><th>Asignatura</th><th>Hora inici</th><th>Hora final</th><th>Professor</th><th>Nivell</th><th>Sala</th><th>Requisits</th><th>Places</th><th>Estat</th></tr></thead><tbody>";
                        $tallers = $conn->query("SELECT * FROM Tallers WHERE Date='".$row['Date']."'");
                        if($tallers->num_rows > 0){
                           while($rowTallers = $tallers->fetch_assoc()){
			      $teacher = getPeople("ID",$rowTallers['Teacher'],"lastname, firstname")[0];
                              echo "<tr><td>".$rowTallers['name']."</td><td>".$rowTallers['Subject']."</td><td>".substr($rowTallers['start'],0,5)."</td><td>".substr($rowTallers['end'],0,5)."</td><td>".$teacher['firstname']." ".$teacher['lastname']."</td><td>".$rowTallers['Level']."</td><td>".$rowTallers['Location']."</td><td>".($rowTallers['GTancat']==1 ? 'Grup tancat. ' : '').$rowTallers['requires']."</td><td>".(sizeof($rowTallers["PSignedUp"])>0 ? (string)((int)$rowTallers["PLACES"]-sizeof(explode(",",$rowTallers['PSignedUp']))) : $rowTallers['PLACES'])."/".$rowTallers['PLACES']."</td><td t-id='".$rowTallers['ID']."'>".(strpos($rowTallers['PSignedUp'],$_SESSION['ID'])===false ? (sizeof(explode(",",$rowTallers['PSignedUp'])) >= (int)$rowTallers['PLACES'] ? 'Taller complet' : ($rowTallers['GTancat']==0 || in_array((string)$_SESSION['ID'],explode(",",$rowTallers['People'])) ? '<button id="'.$rowTallers['ID'].'" class=\'btn btn-mini\' data-toggle=\'modal\' data-target=\'#Notify-result\'>Apunta&#x27;m</button>' : "No tens perm&iacute;s per apuntar-te a aquest taller")) : "Ja t'has apuntat a aquest taller")."</td></tr>";
}
                        }
			echo "</tbody></table></div>";
			$i = $i+1;
		   }
		}
		}else{
		echo "</ul></div>No hi ha tallers";
		}
	     $conn->close();
	    ?>
            </div>
        </div>
<div class="modal fade" id="Notify-result" tabindex="-1" role="dialog" aria-labelledby="result" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="result-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<span id="result-text"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$("tbody button").each(function(i,o){
$(o).click(function(e){
$.post("./API/SignInToWorkshop.php",{id:$(o).attr("id")},function(data){
console.log(data);
$("#result-title").text((data=="ok"?"Tot correcte:":"Error: No se t'ha pogut apuntar a aquest taller"));
$("#result-text").text((data=="ok"?"T'has registrat al taller correctament":data));
$("[t-id="+$(o).attr("id")+"]").text("Ja t'has apuntat a aquest taller");
$(o).remove();
});
});
});
</script>
</body>
</html>
