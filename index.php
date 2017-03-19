<html>
<head>
<?php
?>
<link rel="stylesheet" type="text/css" href="css/navtest.css">

		<script type="text/javascript">
		function aendercss(datei){
		document.getElementsByTagName('link')[0].href=datei;
		document.getElementsByTagName('link')[0].rel="stylesheet";
		}
		</script>
</head>
<body>
<div class="menu-wrap">
    <nav  class="menu">
        <ul class="clearfix">
            <li><a href="">Startseite</a></li>
            <li>
                <a href="">Formulare<span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">
                    <li><a href="" onclick="document.getElementById('myframe').src ='/Schnupperverwaltung/lehrer.php';return false;" >Lehrer</a></li>
                    <li><a href="" onclick="document.getElementById('myframe').src ='/Schnupperverwaltung/schueler.php';return false;" >Sch&uuml;ler</a></li>
                    <li><a href="" onclick="document.getElementById('myframe').src ='/Schnupperverwaltung/bewertung.php';return false;" >Bewertung</a></li>
                </ul>
            </li>
            <li>
				<a href="">Abfragen<span class="arrow">&#9660;</span></a>
				    <ul class="sub-menu">
                    <li><a href="" onclick="document.getElementById('myframe').src ='/Schnupperverwaltung/abfrage_lehrer.php';return false;" >Lehrer</a></li>
                    <li><a href="" onclick="document.getElementById('myframe').src ='/Schnupperverwaltung/abfrage_schueler.php';return false;" >Sch&uuml;ler</a></li>
                    <li><a href="" onclick="document.getElementById('myframe').src ='/Schnupperverwaltung/abfrage_bewertung.php';return false;" >Bewertung</a></li>
                </ul>
			</li>
			<li>
			<a href="">Vergr&ouml;&szligern <span class="arrow">&#9660;</span></a>
			 <ul class="sub-menu">
					<li><a href="javascript:aendercss('css/navtest.css')" >Original</a></li>
					  <li><a href="javascript:aendercss('css/Vergoeserung25.css')" >25%</a></li>
					  <li><a href="javascript:aendercss('css/Vergoeserung50.css')" >50%</a></li>
					  <li><a href="javascript:aendercss('css/Vergoeserung75.css')" >75%</a></li>
			</ul>
			</li>
			<li>
			<?php
			session_start();
			if (isset($_SESSION['eingeloggt'])) {
				if ($_SESSION['eingeloggt']) {
					echo "<a href='/Schnupperverwaltung/login/logout.php'>Logout";
				}
				else {
					echo "<a href='' onclick='document.getElementById('myframe').src ='/Schnupperverwaltung/login/loginf.php';return false;'>Login";
			}
			}
			else {
				echo "<a href=\"\" onclick=\"document.getElementById('myframe').src ='/Schnupperverwaltung/login/loginf.php';return false;\">Login";
			}
			?>
			</a></li>
        </ul>
    </nav>
</div>
<iframe name="myframe" id="myframe" width="100%" height="90%" src="" frameborder="0"></iframe>
</body>
</html>