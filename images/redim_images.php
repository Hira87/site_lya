<?php

  if(!function_exists("imagecreatefrompng"))
  	die("Votre serveur ne poss�de pas la biblioth�que GD.");

  $dir = '/volume1/Florian/Photos/lya_sav/';
  $files = scandir($dir);
  for($i=0;$i<count($files);$i++){
    if(strtolower(pathinfo($files[$i],PATHINFO_EXTENSION)) == 'jpg'){
      redim_image($dir,$files[$i]);
      exit;
    }
  }

  function redim_image($chemin,$nomFichier){
    //$nomFichier = "bonheur.jpg"; //Doit �tre dans le m�me r�pertoire que � resize_image.php �

    //Obtention de l'extension du fichier
    $partieFichier = explode(".",$nomFichier);
    if(count($partieFichier) > 0)
    	$extension = array_pop($partieFichier);
    else
    	$extension = "";

    //Si l'un ou l'autre est �gal � 0, le redimensionnement conserve le ratio
    $largeur = 300;
    $hauteur = 300;

    $typeValide = array("PNG","GIF","JPEG","JPG");

    if(empty($chemin.$nomFichier))
    	die("Impossible de trouver l'image, aucun nom sp�cifi�.");

    if(!file_exists($chemin.$nomFichier))
    	die("L'image que vous essayez de redimensionner n'existe pas.");

    if(!in_array(strtoupper($extension), $typeValide))
    	die("Le type de l'image n'est pas valide. Seulement PNG, GIF et JPG sont accept�s.");

    if(empty($largeur) && empty($hauteur))
    	die("Veuillez sp�cifier la nouvelle hauteur et/ou la nouvelle largeur de l'image.");

    if(strtoupper($extension) == "JPG") //La fonction pour cr�er un JPG se nomme imagecreatefromJPEG
    	$extension = "JPEG";

    //Cr�ation de la nouvelle image
    $imageSource = call_user_func_array("imagecreatefrom".strtolower($extension), array($chemin.$nomFichier));

    if(!$imageSource)
    	die("Erreur, ce fichier n'est pas une image ou est corrompu.");

    //Est-ce que l'utilisateur a donn� la largeur/hauteur ou est-ce que nous devons trouver hauteur/largeur ?
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

    //Cr�ation de la nouvelle image
    $imageFinale = imagecreatetruecolor($largeur, $hauteur);
    imagecopyresampled($imageFinale, $imageSource, 0, 0, 0, 0, $largeur, $hauteur, $largeurImageSource, $hauteurImageSource);

    $nomFichierFinal = "thumb_".$nomFichier;
    call_user_func_array("image".strtolower($extension), array($imageFinale, $nomFichierFinal, 100));
    imagedestroy($imageSource);

    rename($nomFichierFinal,$chemin.'miniatures/'.$nomFichierFinal);

    echo "Fichier ".$nomFichierFinal." cr�� avec succ�s.";
  }



?>
