<?php
  $pdo = new PDO('mysql:host=localhost;dbname=site_lya', 'root', '');

  //on commence par parcourir le répertoire
  $chemin = '/volume1/Florian/Photos/Lya/';
  if ($dh = opendir($chemin)) {
        while (($file = readdir($dh)) !== false) {
            echo "<a href=\"$file\"/><br>";
        }
        closedir($dh);
    }

?>
