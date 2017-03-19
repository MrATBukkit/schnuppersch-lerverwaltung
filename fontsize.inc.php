<?php

  /*
  * nach einem gesetzten Cookie suchen
  */
  if (!empty($_COOKIE['fontsize'])) {
    $fontsize = $_COOKIE['fontsize'];
  } elseif (!empty($_COOKIE['fontsizeR'])) {
    $fontsize = $_COOKIE['fontsizeR'];
  } else {
    $fontsize = 101;
  }

  /*
  * Schriftgröße soll geändert werden
  */
  if (isset($_GET['font'])) {

    if ($_GET['font']=='base') {
      $fontsize = 101;
    } elseif (($_GET['font']=='dec') && ($fontsize>60)) {
      $fontsize -= 10;
    } elseif (($_GET['font']=='inc') && ($fontsize<200)) {
      $fontsize += 10;
    }

    /*
    * Session-Cookie setzen, da die meist akzeptiert werden
    */
    setcookie('fontsize', $fontsize, NULL, '/');
    /*
    * zusätzlich versuchen, dauerhaften Cookie zu setzen
    */
    setcookie('fontsizeR', $fontsize, time()+60*60*24*365, '/');

    /*
    * Caching der Seite verhindern
    */
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
    header('Cache-Control: no-store');
    header('Pragma: no-cache');

  }

  /*
  * Hilfsfunktion, zum Erzeugen der Links
  */
  function get_fontsize_link($action, $name) {
    
    $document_uri = current(preg_split('/[&|\?]{1}font=/', $_SERVER['REQUEST_URI']));

    $document_ref = str_replace('&', '&amp;', $document_uri);

    if (strpos($document_ref, '?') === FALSE) {
      $document_ref .= '?font='.$action;
    } else {
      $document_ref .= '&amp;font='.$action;
    }

    return '<a href="'.$document_ref.'">'.$name.'</a>';
  }
  
?>
<?php

  header('Content-Type: text/css; charset=iso-8859-1');

  /*
  * Caching der Seite verhindern
  */
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
  header('Cache-Control: no-store');
  header('Pragma: no-cache');

  list($usec, $sec) = explode(' ',microtime());
  print('/* '.((float)$usec + (float)$sec)." */\n");

  if (!empty($_COOKIE['fontsize'])) {
    $fontsize = $_COOKIE['fontsize'];
  } elseif (!empty($_COOKIE['fontsizeR'])) {
    $fontsize = $_COOKIE['fontsizeR'];
  } else {
    $fontsize = 100.01;
  }

?>
html {
  font-size: <?php print($fontsize); ?>%;
}
<?php

  include('fontsize.inc.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>Schriftgröße testen</title>
  
  <link rel="stylesheet" type="text/css" href="fontsize.css.php" media="all" />

  <style type="text/css">
  /*<![CDATA[*/
    * {
      font-family: sans-serif;
    }
    p.text {
      width: 30em;
      margin-top: 30px;
      border-top: 2px solid black;
      border-bottom: 2px solid black;
    }
  /*]]>*/
  </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>

<body>

  <h2>Änderung im PHP-Script</h2>
  <p>
    <?php print(get_fontsize_link('dec', 'Schrift verkleinern')); ?> -
    <?php print(get_fontsize_link('base', 'Schrift zurücksetzen')); ?> -
    <?php print(get_fontsize_link('inc', 'Schrift vergrößern')); ?>
  </p>
  
  <p class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores.</p>

    <p><a href="../">Zurück zum Artrikel</a></p>

</body>
</html>