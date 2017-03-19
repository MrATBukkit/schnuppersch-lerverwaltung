<html>
<head>
<link rel="stylesheet" type="text/css" href="navtest.css">
</head>
<body>
<div class="menu-wrap">
    <nav  class="menu">
        <ul class="clearfix">
            <li ><a href="#">Startseite</a></li>
            <li>
                <a href="#">Formulare<span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">
                    <li><a href="#">Lehrer</a></li>
                    <li><a href="#">Sch&uuml;ler</a></li>
                    <li><a href="#">Bewertung</a></li>
                </ul>
            </li>
            <li>
				<a href="#">Abfragen<span class="arrow">&#9660;</span></a>
				    <ul class="sub-menu">
                    <li><a href="#">Lehrer</a></li>
                    <li><a href="#">Sch&uuml;ler</a></li>
                    <li><a href="#">Bewertung</a></li>
                </ul>
				</li>
            <li>
			<?php
			session_start();
			if (isset($_SESSION['eingeloggt'])) {
				if ($_SESSION['eingeloggt']) {
					echo "<a href=''>Logout";
				}
				else {
					echo "<a href=''>Login";
			}
			}
			else {
				echo "<a href=''>Login";
			}
			?>
			</a></li>
        </ul>
    </nav>
</div>
<iframe width="100%" height="90%" src="lehrer.php" frameborder="0"></iframe>
</body>
</html>