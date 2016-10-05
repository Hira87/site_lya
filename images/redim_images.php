<?php

  if(!function_exists("imagecreatefrompng"))
  	die("Votre serveur ne possède pas la bibliothèque GD.");

  $dir = '/volume1/Florian/Photos/lya_sav/';
  $files = scandir($dir);
  for($i=0;$i<count($files);$i++){
    if(strtolower(pathinfo($files[$i],PATHINFO_EXTENSION)) == 'jpg'){
      redim_image($dir,$files[$i]);
      exit;
    }
  }

  function redim_image($chemin,$nomFichier){
    //$nomFichier = "bonheur.jpg"; //Doit être dans le même répertoire que « resize_image.php »

    //Obtention de l'extension du fichier
    $partieFichier = explode(".",$nomFichier);
    if(count($partieFichier) > 0)
    	$extension = array_pop($partieFichier);
    else
    	$extension = "";

    //Si l'un ou l'autre est égal à 0, le redimensionnement conserve le ratio
    $largeur = 300;
    $hauteur = 300;

    $typeValide = array("PNG","GIF","JPEG","JPG");

    if(empty($chemin.$nomFichier))
    	die("Impossible de trouver l'image, aucun nom spécifié.");

    if(!file_exists($chemin.$nomFichier))
    	die("L'image que vous essayez de redimensionner n'existe pas.");

    if(!in_array(strtoupper($extension), $typeValide))
    	die("Le type de l'image n'est pas valide. Seulement PNG, GIF et JPG sont acceptés.");

    if(empty($largeur) && empty($hauteur))
    	die("Veuillez spécifier la nouvelle hauteur et/ou la nouvelle largeur de l'image.");

    if(strtoupper($extension) == "JPG") //La fonction pour créer un JPG se nomme imagecreatefromJPEG
    	$extension = "JPEG";

    //Création de la nouvelle image
    $imageSource = call_user_func_array("imagecreatefrom".strtolower($extension), array($chemin.$nomFichier));

    if(!$imageSource)
    	die("Erreur, ce fichier n'est pas une image ou est corrompu.");

    //Est-ce que l'utilisateur a donné la largeur/hauteur ou est-ce que nous devons trouver hauteur/largeur ?
    if(empty($largeur) || empty($hauteur))
    {
    	list($largeurImageSource, $hauteurImageSource) = getimagesize($chemin.$nomFichier);

    	if(empty($largeur))
    	{
    		$ratio = $hauteur / $hauteurImageSource;
    		$largeur = $largeurImageSource * $ratio;
    	}
    	else
    	{
    		$ratio = $largeur / $largeurImageSource;
    		$hauteur = $hauteurImageSource * $ratio;
    	}
    }

    //Création de la nouvelle image
    $imageFinale = imagecreatetruecolor($largeur, $hauteur);
    imagecopyresampled($imageFinale, $imageSource, 0, 0, 0, 0, $largeur, $hauteur, $largeurImageSource, $hauteurImageSource);

    $nomFichierFinal = "thumb_".$nomFichier;
    call_user_func_array("image".strtolower($extension), array($imageFinale, $nomFichierFinal, 100));
    imagedestroy($imageSource);

    rename($nomFichierFinal,$chemin.'miniatures/'.$nomFichierFinal);

    echo "Fichier ".$nomFichierFinal." créé avec succès.";
  }



?>
