<html>
<head>
<title>Bewertung</title>
<?php
require_once('./login/auth.php');
?>
</head>
<body>
<h1>Bewertung Anlegen</h1>
<p>
<?php
if (isset($_POST['ID'])) {
	if ($_POST['LID'] != $_SESSION['lehrerid']) {
		echo "<h2>Leider ist das nicht ihre Bewertung</h2>
			<p>Sie d&uuml;rfen nur Bewertung bearbeiten die Sie erstellt haben haben</p>";
		exit();
	}
}
?>
</p>
<p>
</p>
<form action="Bewertungspeichern.php" method="POST">
<table border="1">
<tr>
<td bgcolor="#03FF39" colspan="2" align="center">Bewertung</td>
</tr>
<tr>
<td bgcolor="#FFC803">Schüler</td>
<td bgcolor="#FFC803"><select name="Schueler">
<?php
require_once('./scripte/datenbank.php');
$sql = "SELECT * FROM schueler";
$db_erg = mysqli_query( $db_link, $sql );
while ($zeile = mysqli_fetch_array($db_erg))
	{
		if (isset($_POST['SID']))
		{
			if ($_POST['SID'] == $zeile['Schueler_ID']) {
				echo "<option selected value='".$zeile['Schueler_ID']."'>".$zeile['Vorname']." ".$zeile['Nachname']."</option>";
			}
		}
		else { 
			echo "<option value='".$zeile['Schueler_ID']."'>".$zeile['Vorname']." ".$zeile['Nachname']."</option>";
		}
	}
?>
</select>
 </tr>
<td bgcolor="#FFC803">Lehrer</td>
<td bgcolor="#FFC803"><select name="Lehrer">
<?php
require_once('./scripte/datenbank.php');
$sql = "SELECT * FROM lehrer where LehrerID='".$_SESSION['lehrerid']."'";
$db_erg = mysqli_query( $db_link, $sql );
while ($zeile = mysqli_fetch_array($db_erg))
	{
	echo"<option value='".$zeile['LehrerID']."'>".$zeile['Vorname']." ".$zeile['Nachname'];
	}
?>
</select> 
 <tr>
<td bgcolor="#FFC803">Interesse</td>
<td bgcolor="#FFC803"><select name="Interesse">
 <option value="1" <?php if (isset($_POST['Interresse'])) { if ( $_POST['Interresse'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Interresse'])) { if ( $_POST['Interresse'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Interresse'])) { if ( $_POST['Interresse'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Interresse'])) { if ( $_POST['Interresse'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Interresse'])) { if ( $_POST['Interresse'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Lernfähigkeit</td>
<td bgcolor="#FFC803"><select name="Lernfaehigkeit">
 <option value="1" <?php if (isset($_POST['Lernfaehigkeit'])) { if ( $_POST['Lernfaehigkeit'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Lernfaehigkeit'])) { if ( $_POST['Lernfaehigkeit'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Lernfaehigkeit'])) { if ( $_POST['Lernfaehigkeit'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Lernfaehigkeit'])) { if ( $_POST['Lernfaehigkeit'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Lernfaehigkeit'])) { if ( $_POST['Lernfaehigkeit'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Motivation</td>
<td bgcolor="#FFC803"><select name="Motivation">
 <option value="1" <?php if (isset($_POST['Motivation'])) { if ( $_POST['Motivation'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Motivation'])) { if ( $_POST['Motivation'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Motivation'])) { if ( $_POST['Motivation'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Motivation'])) { if ( $_POST['Motivation'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Motivation'])) { if ( $_POST['Motivation'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
 </tr>
<tr>
<td bgcolor="#FFC803">Genauigkeit</td>
<td bgcolor="#FFC803"><select name="Genauigkeit">
 <option value="1" <?php if (isset($_POST['Genauigkeit'])) { if ( $_POST['Genauigkeit'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Genauigkeit'])) { if ( $_POST['Genauigkeit'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Genauigkeit'])) { if ( $_POST['Genauigkeit'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Genauigkeit'])) { if ( $_POST['Genauigkeit'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Genauigkeit'])) { if ( $_POST['Genauigkeit'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Ausdauer</td>
<td bgcolor="#FFC803"><select name="Ausdauer">
 <option value="1" <?php if (isset($_POST['Ausdauer'])) { if ( $_POST['Ausdauer'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Ausdauer'])) { if ( $_POST['Ausdauer'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Ausdauer'])) { if ( $_POST['Ausdauer'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Ausdauer'])) { if ( $_POST['Ausdauer'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Ausdauer'])) { if ( $_POST['Ausdauer'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Pünktlichkeit</td>
<td bgcolor="#FFC803"><select name="Puenktlichkeit">
 <option value="1" <?php if (isset($_POST['Puenktlichkeit'])) { if ( $_POST['Puenktlichkeit'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Puenktlichkeit'])) { if ( $_POST['Puenktlichkeit'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Puenktlichkeit'])) { if ( $_POST['Puenktlichkeit'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Puenktlichkeit'])) { if ( $_POST['Puenktlichkeit'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Puenktlichkeit'])) { if ( $_POST['Puenktlichkeit'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Belastbarkeit</td>
<td bgcolor="#FFC803"><select name="Belastbarkeit">
 <option value="1" <?php if (isset($_POST['Belastbarkeit'])) { if ( $_POST['Belastbarkeit'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Belastbarkeit'])) { if ( $_POST['Belastbarkeit'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Belastbarkeit'])) { if ( $_POST['Belastbarkeit'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Belastbarkeit'])) { if ( $_POST['Belastbarkeit'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Belastbarkeit'])) { if ( $_POST['Belastbarkeit'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Arbeitstempo</td>
<td bgcolor="#FFC803"><select name="Arbeitstempo">
 <option value="1" <?php if (isset($_POST['Arbeitstempo'])) { if ( $_POST['Arbeitstempo'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Arbeitstempo'])) { if ( $_POST['Arbeitstempo'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Arbeitstempo'])) { if ( $_POST['Arbeitstempo'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Arbeitstempo'])) { if ( $_POST['Arbeitstempo'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Arbeitstempo'])) { if ( $_POST['Arbeitstempo'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Folgsamkeit</td>
<td bgcolor="#FFC803"><select name="Folgsamkeit">
 <option value="1" <?php if (isset($_POST['Folgsamkeit'])) { if ( $_POST['Folgsamkeit'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Folgsamkeit'])) { if ( $_POST['Folgsamkeit'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Folgsamkeit'])) { if ( $_POST['Folgsamkeit'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Folgsamkeit'])) { if ( $_POST['Folgsamkeit'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Folgsamkeit'])) { if ( $_POST['Folgsamkeit'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Geschicklichkeit</td>
<td bgcolor="#FFC803"><select name="Geschicklichkeit">
 <option value="1" <?php if (isset($_POST['Geschicklichkeit'])) { if ( $_POST['Geschicklichkeit'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Geschicklichkeit'])) { if ( $_POST['Geschicklichkeit'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Geschicklichkeit'])) { if ( $_POST['Geschicklichkeit'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Geschicklichkeit'])) { if ( $_POST['Geschicklichkeit'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Geschicklichkeit'])) { if ( $_POST['Geschicklichkeit'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Leistungsbereitschaft</td>
<td bgcolor="#FFC803"><select name="Leistungsbereitschaft">
 <option value="1" <?php if (isset($_POST['Leistungsbereitschaft'])) { if ( $_POST['Leistungsbereitschaft'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Leistungsbereitschaft'])) { if ( $_POST['Leistungsbereitschaft'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Leistungsbereitschaft'])) { if ( $_POST['Leistungsbereitschaft'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Leistungsbereitschaft'])) { if ( $_POST['Leistungsbereitschaft'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Leistungsbereitschaft'])) { if ( $_POST['Leistungsbereitschaft'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Gewissenhaftigkeit</td>
<td bgcolor="#FFC803"><select name="Gewissenhaftigkeit">
 <option value="1" <?php if (isset($_POST['Gewissenhaftigkeit'])) { if ( $_POST['Gewissenhaftigkeit'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Gewissenhaftigkeit'])) { if ( $_POST['Gewissenhaftigkeit'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Gewissenhaftigkeit'])) { if ( $_POST['Gewissenhaftigkeit'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Gewissenhaftigkeit'])) { if ( $_POST['Gewissenhaftigkeit'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Gewissenhaftigkeit'])) { if ( $_POST['Gewissenhaftigkeit'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Auffasungsgabe</td>
<td bgcolor="#FFC803"><select name="Auffasungsgabe">
 <option value="1" <?php if (isset($_POST['Auffassungsgabe'])) { if ( $_POST['Auffassungsgabe'] == 1) { echo "selected";}} ?>>1</option>
 <option value="2" <?php if (isset($_POST['Auffassungsgabe'])) { if ( $_POST['Auffassungsgabe'] == 2) { echo "selected";}} ?>>2</option>
 <option value="3" <?php if (isset($_POST['Auffassungsgabe'])) { if ( $_POST['Auffassungsgabe'] == 3) { echo "selected";}} ?>>3</option>
 <option value="4" <?php if (isset($_POST['Auffassungsgabe'])) { if ( $_POST['Auffassungsgabe'] == 4) { echo "selected";}} ?>>4</option>
 <option value="5" <?php if (isset($_POST['Auffassungsgabe'])) { if ( $_POST['Auffassungsgabe'] == 5) { echo "selected";}} ?>>5</option>
 </select>
 </td>
</tr>
<tr>
<td bgcolor="#FFC803">Kommentar</td>
<!--Ist ein langer Feld wo man Kommentare hinein schreiben kann-->
<td bgcolor="#FFC803"> 
   <div>  
      <label for="text"></label>
         <textarea id="text" name="Kommentar" alt="Kommentar" cols="35" rows="4" <?php if (isset($_POST['Kommentar'])) { echo $_POST['Kommentar'];}  ?>></textarea> 	
<!--Damit die Kommentare nicht nur in eine Länge geschrieben werden sonder das es von selbst Absätze macht-->
   </div> 
 </td>
</tr>
</table>
<?php
if (isset($_POST['ID'])) {
	echo "<input type='hidden' value='".$_POST['ID']."' name='ID'>
			<input type='hidden' value='".$_POST['SID']."' name='SID'>";
}
?>
<input type="submit" value="Senden" />
</form>
</body>
</html>