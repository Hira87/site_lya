<?php
  //connexion BDD
  $pdo = new PDO('mysql:host=localhost;dbname=site_lya', 'Florian', 'EWapCk5yn-YcQ7)u9Q22/;@L2.78^a');

  function genere_grid_images($page,$limit){
    global $pdo;
    $page--;
    $debut = $page*30;
    $sql = 'SELECT * FROM images limit '.$debut.','.$limit;
    $req = $pdo->query($sql);
    $grid = "";
    while($row = $req->fetch()) {
      $grid .= '<div class="grid-item">
              <a href="'.addslashes($row['chemin']).'" class="swipebox">
                <img class="lazy" data-original="'.addslashes($row['miniature']).'">
              </a>
            </div>';
    }
    $req->closeCursor();
    return $grid;
  }
?>
