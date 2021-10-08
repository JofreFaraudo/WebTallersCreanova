<?php
$result = "Sessi&oacute; tancada correctament";
session_start() or $result="No s'ha pogut tancar la sessi&oacute;";
session_destroy() or $result="No s'ha pogut tancar la sessi&oacute;";
echo $result;
?>
