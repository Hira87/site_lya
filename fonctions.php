<?php
  function genere_grid_images($page,$limit){
    $page--;
    $sql = 'SELECT * FROM images limit '.$page.','.$limit;
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
