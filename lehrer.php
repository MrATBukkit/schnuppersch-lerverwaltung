<html>
<head>
<title>Lehrer</title>
<?php
if (isset($_POST['ID'])) {
	echo "<style>
	.bearb {
		display: none;
	}</style>";
}
?>
</head>
<body>
<h1>Lehrer Anlegen</h1>
<?php
require_once('./login/auth.php');
if (!$rlehrer) {
	echo "<h2>Keine Rechte</h2>";
	exit();
}
?>
<p>
</p>
<form action="lehrerspeichern.php" method="POST" id="lehrer">
<table border="1">
<tr>
<td bgcolor="#FF3E03" colspan="2" align="center">Lehrer</td>
</tr>
<tr>
<td bgcolor="#F1F900">Vorname</td>
<td bgcolor="#F1F900"><input type="text" name="vorname" id="Vorname" size="25" value='<?php if (isset($_POST['Vorname'])) {echo $_POST['Vorname'];} ?>'></td>
</tr>
<tr>
<td bgcolor="#F1F900">Nachname</td>
<td bgcolor="#F1F900"><input type="text" name="Nachname" id="Nachname" size="25" value='<?php if (isset($_POST['Nachname'])) {echo $_POST['Nachname'];} ?>'></td>
</tr>
<tr>
<td bgcolor="#F1F900">Benutzername</td>
<td bgcolor="#F1F900"><input type="text" name="Benutzername" id="Benutzername" size="25" value='<?php if (isset($_POST['username'])) {echo $_POST['username'];} ?>'></td>
</tr>
<tr class="bearb">
<td class="bearb" bgcolor="#F1F900">Password</td>
<td class="bearb" bgcolor="#F1F900"><input type="password" name="pword" alt="Password" id="pword" ></td>
</tr>
<tr class="bearb">
<td bgcolor="#F1F900" class="bearb">Password wiederholen</td>
<td bgcolor="#F1F900" class="bearb"><input type="password" name="pword2" alt="Password wiederholen" id="pword2" ></td>
</tr>
<tr>
<td bgcolor="#F1F900">Darf Sch&uuml;ler anlegen</td>
<td bgcolor="#F1F900"><input type="checkbox" name="rschuel" alt="Darf der Benutzer Schüler erstellen" <?php if (isset($_POST['rschuel'])) { if ($_POST['rschuel'] ==1) {echo "checked";}} ?>>Darf der Benutzer Schüler erstellen</td>
<!--Ist ein Feld wo ich ein häkchen einsetzen kann-->
</tr>
<tr>
<td bgcolor="#F1F900">Darf Lehrer anlegen</td>
<td bgcolor="#F1F900"><input type="checkbox" name="rlehrer" alt="Darf der Benutzer Lehrer erstellen" <?php if (isset($_POST['rlehrer'])) { if ($_POST['rlehrer'] ==1) {echo "checked";}} ?>>Darf der Benutzer Lehrer erstellen</td>
</tr>
</table>
<?php
if (isset($_POST['ID'])) {
	echo '<input type="hidden" value="'.$_POST['ID'].'" name="ID">';
}
?>
<input type="button" value="Senden" name="Senden" onClick="formularsenden()">
<script type="text/javascript" src="/Schnupperverwaltung/js/lehrer.js"></script>
</form>
</body>
</html>
