</center>
<div>
<canvas id='myChart' width="700" height="700"></canvas><div id="legendDiv"></div>
</div>
<script type="text/javascript" src="/Schnupperverwaltung/js/Chart/Chart.min.js"></script>
<script type="text/javascript">
var data = {
    labels: ["Lernfähigkeit", "Interesse", "Motivation", "Genauigkeit", "Ausdauer", "Leistungsbereitschaft", "Belastbarkeit", 
	"Arbeitstempo", "Folgsamkeit", "Geschicklichkeit", "Pünktlichkeit", "Gewissenhaftigkeit", "Auffassungsgabe"],
    datasets: [
		<?php	
		require_once('./scripte/datenbank.php');
		require_once('./login/auth.php');
		$sql = "SELECT AVG(`Interesse`) AS Interesse, 
		AVG(`Lernfaehigkeit`) AS Lernfaehigkeit,
		AVG(`Motivation`) AS Motivation,
		AVG(`Genauigkeit`) AS Genauigkeit,
		AVG(`Ausdauer`) AS Ausdauer,
		AVG(`Puenktlichkeit`) AS Puenktlichkeit,
		AVG(`Belastbarkeit`) AS Belastbarkeit,
		AVG(`Arbeitstempo`) AS Arbeitstempo,
		AVG(`Folgsamkeit`) AS Folgsamkeit,
		AVG(`Geschicklichkeit`) AS Geschicklichkeit,
		AVG(`Leistungsbereitschaft`) AS Leistungsbereitschaft,
		AVG(`Gewissenhaftigkeit`) AS Gewissenhaftigkeit,
		AVG(`Auffassungsgabe`) AS Auffassungsgabe FROM bewertung WHERE Schueler_ID='".$_GET['id']."'";
		$db_erg = mysqli_query( $db_link, $sql );
		while ($zeile = mysqli_fetch_array($db_erg)) {
			$rgb = rand(0,255).",".rand(0,255).",".rand(0,255);
			echo "        {
				label: 'Durchschnitt',
				fillColor: 'rgba($rgb,0.2)',
				strokeColor: 'rgba($rgb,1)',
				pointColor: 'rgba($rgb,1)',
				pointStrokeColor: '#fff',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba($rgb,1)',
				data: [".$zeile['Lernfaehigkeit'].", ".$zeile['Interesse'].", ".$zeile['Motivation'].", ".$zeile['Genauigkeit'].",
				".$zeile['Ausdauer'].", ".$zeile['Leistungsbereitschaft'].", ".$zeile['Belastbarkeit'].", ".$zeile['Arbeitstempo'].",
				".$zeile['Folgsamkeit'].", ".$zeile['Geschicklichkeit'].", ".$zeile['Puenktlichkeit'].", 
				".$zeile['Gewissenhaftigkeit'].", ".$zeile['Auffassungsgabe']."]
        },";
		}
		$sql = "SELECT * FROM bewertung b join lehrer l on b.Lehrer_ID=l.LehrerID where b.Schueler_ID='".$_GET['id']."'";
		//SQL Befehl wird ausgeführt und in db_erg gespeichert
		$db_erg = mysqli_query( $db_link, $sql );
		while ($zeile = mysqli_fetch_array($db_erg)) {
			$rgb = rand(0,255).",".rand(0,255).",".rand(0,255);
				echo "        {
					label: '".$zeile['Vorname']." ".$zeile['Nachname']."',
					fillColor: 'rgba(0,0,0,0)',
					strokeColor: 'rgba($rgb,1)',
					pointColor: 'rgba($rgb,1)',
					pointStrokeColor: '#fff',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba($rgb,1)',
					data: [".$zeile['Lernfaehigkeit'].", ".$zeile['Interesse'].", ".$zeile['Motivation'].", ".$zeile['Genauigkeit'].",
					".$zeile['Ausdauer'].", ".$zeile['Leistungsbereitschaft'].", ".$zeile['Belastbarkeit'].", ".$zeile['Arbeitstempo'].",
					".$zeile['Folgsamkeit'].", ".$zeile['Geschicklichkeit'].", ".$zeile['Puenktlichkeit'].", 
					".$zeile['Gewissenhaftigkeit'].", ".$zeile['Auffassungsgabe']."]
        },";}
		?>
    ]
};
var ctx = document.getElementById("myChart").getContext("2d");
var myNewChart = new Chart(ctx).Radar(data);
document.getElementById("legendDiv").innerHTML = myNewChart.generateLegend();
</script>