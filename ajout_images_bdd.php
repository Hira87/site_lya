<?php
try{
  $pdo = new PDO('mysql:host=localhost;dbname=site_lya', 'Florian', 'EWapCk5yn-YcQ7)u9Q22/;@L2.78^a');
}
catch (Exception $e)
{
        exit('Erreur : ' . $e->getMessage());
}
  //on commence par parcourir le répertoire
  $dir = '/volume1/Florian/Photos/Lya/';
  $files = scandir($dir);
  for($i=0;$i<count($files);$i++){
      if(strtolower(pathinfo($files[$i],PATHINFO_EXTENSION)) == 'jpg'){
        $req = $pdo->prepare("INSERT INTO images (chemin) VALUES (:chemin)");
        $req->execute(
                   array(
                         "chemin" => "./photos/".$files[$i]
                        )
                     );

    }
}

?>
