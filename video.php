<?php
  require "login/loginheader.php";
  //require_once('settings.inc');
//connexion BDD
$pdo = new PDO('mysql:host=localhost;dbname=site_lya', 'Florian', 'EWapCk5yn-YcQ7)u9Q22/;@L2.78^a');

 ?>
<!DOCTYPE html>
<html lang="fr" class="no-js">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <script src="js/fonctions.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/component.css" />
		<script src="GoogleNexusWebsiteMenu/js/modernizr.custom.js"></script>

  </head>
  <body>

    <h1>&nbsp;</h1>

      <div class="videos">
        <?php
        $dir = '/volume1/Florian/video_lya/';
        $files = scandir($dir);
        for($i=0;$i<count($files);$i++){
          if(strtolower(pathinfo($files[$i],PATHINFO_EXTENSION)) == 'mp4'){
            echo '<video width="300" controls >
            	<source src="./videos/'.$files[$i].'" type="video/mp4">
            	Votre navigateur ne supporte pas le lecteur HTML5.
            </video>';
          }
        }
        ?>
      </div>

      <div class="container">
    		<ul id="gn-menu" class="gn-menu-main">
    			<li class="gn-trigger" style="left:0">
    				<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
    				<nav class="gn-menu-wrapper">
    					<div class="gn-scroller">
    						<ul class="gn-menu">
    							<li><a href="index.php" class="gn-icon gn-icon-photo">Photos</a></li>
    							<li><a href="video.php" class="gn-icon gn-icon-video">VidÃ©os (A venir)</a></li>
    						</ul>
    				</nav>
    			</li>
    		</ul>
    	</div>
	<script src="GoogleNexusWebsiteMenu/js/classie.js"></script>
	<script src="GoogleNexusWebsiteMenu/js/gnmenu.js"></script>
	<script>
    new gnMenu( document.getElementById( 'gn-menu' ) );
	</script>
  </body>

</html>
