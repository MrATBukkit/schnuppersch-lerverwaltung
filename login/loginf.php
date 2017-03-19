<html>
<head>
<title>Login</title>
</head>
<body>
<center>
<!--Formular-->
<form action="login.php" method="POST">
<?php
/*Wenn die über GET die Variable message übergeben wird dir der Inhalt anzeigt.
Der sinn davon ist das man z.B. Benutzername oder Password ist Falsch als Fehlermeldung anzeigen kann*/
if (isset($_GET['message'])) {
	echo $_GET['message'];
}
?>
<table>
<tr>
<!--Legt ein Textfeld username an-->
<td>Benutzername</td><td><input type="text" name="username"></td>
</tr>
<tr>
<!--Password Feld wird angelegt umbedingt Type password-->
<td>Password</td><td><input type="password" name="password"></td>
</tr>
</table>
<!--Senden Knopf-->
<input type="submit" value="Einlogen">
</form>
</center>
</body>
</html>