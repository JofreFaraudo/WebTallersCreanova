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
<style>
#log-in-buttons.gt>button{
position: relative;
}
#log-in-buttons.gt{
width: 100%;
text-align: center;
position:absolute;
max-width: 80%;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link href="/css/estils.css" rel="stylesheet" type="text/css">
<title>Add a workshop | Tallers d&#x27;ESOCreanova</title>
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
<br>Add a workshop</h2>
<br>
<br>
<form id='addTallers' method='Post' action='./result.php' autocomplete="off">
<input type="hidden" name="operation" value="addworkshop">
<div class="form-group has-feedback">
<input name='name' required placeholder='Name' type='text' title='Name' class='form-control'>
<span class='fa fa-pen-square form-control-feedback'>
</div>
<div class="form-group has-feedback">
<input name='Location' required type='text' placeholder='Room' title='Room' class='form-control'>
<span class='fa fa-map-marker form-control-feedback'> 
</div>
Date (yyyy-mm-dd):
<div class="form-group has-feedback">
        <input name='date' id='date' type="date" class="form-control" required title="date">

        <span class="fa fa-calendar-alt form-control-feedback" style='font-weight:400;'></span>

      </div>
Start time:
<div class="form-group has-feedback">
        <input name="start" type="time" id='start' class="form-control" required title="Start time">
	<span class="fa fa-clock form-control-feedback"></span>

      </div>
End time:
<div class="form-group has-feedback">
        <input name="end" type="time" id='end' class="form-control" required title="End time">
	<span class="fa fa-clock form-control-feedback"></span>
</div>
Places: 
<div class="form-group has-feedback">
	<input type="number" name="places" required title="Places" class="form-control" value='12' min="2" max="20">
        <span class="fa fa-users form-control-feedback"></span>
</div>
<div class='form-group'>
	<span>Teacher:</span>
	<?php
		$value = getPeople("ISTEACHER",1,"firstname,lastname,ID");
		if($value==="Error"){echo "Error";}
		else{
			echo "<select class=\"form-control\" name=\"teacher\">";
			foreach ($value as $data) {
				echo "<option value=\"".$data['ID']."\">".$data['firstname']." ".$data['lastname']."</option>";
			}
			echo "</select>";
		}
	?>
</div>
<div class='form-group'>
<span>Subject:</span>
<select class='form-control' name='subject' id='subject'>
<option value='CAT'>Catal&agrave;</option>
<option value='CAS'>Castellano</option>
<option value='ENG'>English</option>
<option value='MAT'>Matem&agrave;tiques</option>
<option value='HIS'>Hist&ograve;ria</option>
<option value='BIO'>Biologia</option>
<option value='GEO'>Geologia</option>
<option value='GRF'>Geografia</option>
<option value='FIS'>F&iacute;sica</option>
<option value='QUI'>Qu&iacute;mica</option>
<option value='EDF'>Educaci&oacute; f&iacute;sica</option>
<option value='TEC'>Tecnologia</option>
<option value='TTR'>Teatre</option>
<option value='DNS'>Dansa</option>
<option value='PRE'>Presentacions</option>
<option value='XIN'>Xin&egrave;s &#x28;中國&#x29;</option>
<option value='FRA'>Franc&egrave;s &#x28;Fran&#xE7;ais&#x29;</option>
<option value='ALE'>Alemany &#x28;Deutsch&#x29;</option>
<option value='MUS'>M&uacute;sica</option>
<option value='DIT'>Dibuix t&egrave;cnic</option>
<option value='ECO'>Economia</option>
<option value='FIL'>Filosofia</option>
<option value='EVP'>Educaci&oacute; visual i pl&agrave;stica</option>
<option value='OTH'>Others</option>
</select>
</div>
<div class="form-group has-feedback">
<input id='other' type="text" class='form-control' placeholder="If you select the &#x27;Other&#x27; option. Type here the subject..." name='other' disabled>
<span class="fa fa-code-branch form-control-feedback"></span>
</div>
<div class="form-group">
<span>Level:</span>
<select class='form-control' name='level'>
<option value='MID'>MIDDLE</option>
<option value='HIG' selected>HIGH</option>
<option value='ALT'>Nivell MITJ&Agrave;</option>
<option value='MIT'>Nivell ALT</option>
</select>
</div>
<div class="form-group">
	<textarea style="resize:none;height:initial !important" name='requisits' rows="5" class="form-control" placeholder="Requirements"></textarea>
</div>
<label class="container" style='z-index:800;max-width:initial'>
  Closed group
  <input type='hidden' value='0' name='gruptancat'>
  <input type="checkbox" value='1' id='grup-tancat' name='gruptancat'>
  <span class="checkmark"></span>
</label>
<div id='log-in-buttons'>
<button id='SUBMIT' type='SUBMIT' title='Add the workshop' class='btn'>
<i class="fa fa-edit"></i>
Add workshop
</button>
<button class='btn' title='Reset to default' type='RESET'>
<i class="fas fa-eraser"></i>
Reset
</button>
</div>
</form>
<div class="members non-display" id="members-box">
<div class='form-group has-feedback autocomplete'>
<input autocomplete='off' placeholder="Escriu les persones amb acc&eacute;s al taller" class='form-control' type='text' id='add-member'>
<span class='fa fa-user-plus form-control-feedback'></span>
</div>
<div class='container-fluid' style='background:#ddd' id='members-list'></div>
</div>
</div>
<script language='JavaScript' type='text/javascript'>
function update(){
if($('#grup-tancat').prop("checked")){
$('#members-box').removeClass('non-display');
$("#log-in-buttons").addClass("gt");
$("#log-in-buttons").css("top",$(document).height()-60);
}else{
$('#members-box').addClass('non-display');
$("#log-in-buttons").removeClass("gt");
$("#log-in-buttons").css("top","");
}
}
$('#grup-tancat').change(update);
</script>
<script src="js/autocomplete.js" language="JavaScript" type="text/javascript"></script>
<script language='JavaScript' type='text/javascript'>
var users = [<?php $first=true; foreach (getPeople("ISTEACHER",0,"firstname,lastname,LEVEL,ID") as $data) {
echo ($first ? "" : ",")."{name:\"".$data['firstname']."\",lastname:\"".$data['lastname']."\",level:\"".$data['LEVEL']."\",id:".$data['ID']."}";
$first=false;} ?>];
console.log(users);
autocomplete(document.getElementById("add-member"), [<?php $first=true; foreach (getPeople("ISTEACHER",0,"firstname,lastname,LEVEL,ID") as $data) {
echo ($first ? "" : ",")."{name:\"".$data['firstname']."\",lastname:\"".$data['lastname']."\",level:\"".$data['LEVEL']."\",id:".$data['ID']."}";
$first=false;} ?>]);
document.getElementById('subject').onchange = function () {
if(document.getElementById('subject').value=='OTH'){
$('#other').removeAttr('disabled');
}else{
$('#other').attr('disabled', '');
}
}
$('#SUBMIT').click(function(){
var iusr = [];
var usr = $("#members-list").html().split("<br>"); 
for(i=0;i<usr.length;i++){
for(j=0;j<users.length;j++){
if(users[j].name+" "+users[j].lastname+" "+users[j].level == usr[i].substring(1,usr[i].length-1)){
iusr.push(users[j].id);
break;
}
}
}
console.log(iusr);
alert(iusr);
$('#addTallers').append("<input type='hidden' name='people' value=\""+iusr+"\">");
alert("fi");
});
$(document).ready(function(){
var datetime = new Date();
$('#date').attr("value",datetime.getFullYear()+(datetime.getMonth()<9?"-0":"-")+(datetime.getMonth()+1)+(datetime.getDate()<10?"-0":"-")+datetime.getDate());
var hour = datetime.getHours();
var min = datetime.getMinutes();
$('#start').attr("value",(hour<10?"0":"")+hour+(min<10?":0":":")+min);
$('#end').attr("value",(hour<9?"0":"")+(hour+1)+(min<10?":0":":")+min);
});
</script>
</body>
</html>
