<?php
  require_once('fonctions.php');
  if($_POST['type']=='pagine'){
    echo genere_grid_images($_POST['page'],$_POST['limit']);
  }
?>
