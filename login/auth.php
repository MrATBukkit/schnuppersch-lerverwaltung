<?php
session_start();
$rschueler='0';
$rlehrer='0';
require_once('./scripte/datenbank.php');
if (isset($_SESSION['eingeloggt'])){
	if (!$_SESSION['eingeloggt']){
		header('Location: '.$uri.'/Schnupperverwaltung/login/loginf.php');
	}
}
else {
	header('Location: '.$uri.'/Schnupperverwaltung/login/loginf.php');
}
$sql = "SELECT * FROM lehrer WHERE LehrerID=".$_SESSION['lehrerid'];
$db_erg = mysqli_query( $db_link, $sql );
while ($zeile = mysqli_fetch_array($db_erg)){
	$rschueler = $zeile['rschuel'];
	$rlehrer = $zeile['rlehrer'];
}
?>