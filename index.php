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

    <script src="swipebox/lib/jquery-2.1.0.min.js"></script>
    <link rel="stylesheet" href="swipebox/demo/normalize.css">
  	<link rel="stylesheet" href="swipebox/demo/bagpakk.min.css">
  	<link rel="stylesheet" href="swipebox/demo/style.css">
  	<link rel="stylesheet" href="swipebox/src/css/swipebox.css">
  	<script src="swipebox/lib/ios-orientationchange-fix.js"></script>
  	<script src="swipebox/src/js/jquery.swipebox.js"></script>

    <!--<script src="js/jquery-3.1.0.min.js"></script>-->
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/fonctions.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/component.css" />
		<script src="GoogleNexusWebsiteMenu/js/modernizr.custom.js"></script>

    <!-- lazy loader pour charger les images progressivement -->
    <script src="js/jquery.lazyload.min.js"></script>
  </head>
  <body>

    <h1>&nbsp;</h1>

      <div class="grid">
        <div class="bord"></div>
        <div class="grid-sizer"></div>
        <?php
          $sql = 'SELECT * FROM images limit 0,50';
          $req = $pdo->query($sql);
          while($row = $req->fetch()) {
            echo '<div class="grid-item">
                    <a href="'.addslashes($row['chemin']).'" class="swipebox">
                      <img class="lazy" data-original="'.addslashes($row['miniature']).'">
                    </a>
                  </div>';
          }
          $req->closeCursor();
        ?>
        <!--<div class="grid-item">
          <a href="images/dartagnan.jpg" class="swipebox" title="dartagnan">
            <img src="images/dartagnan.jpg" alt="dartagnan">
          </a>
        </div>
        <div id="tipi" class="grid-item">
          <img src="images/tipi.jpg"/>
        </div>
        <div id="nous3" class="grid-item">
          <img src="images/nous3.jpg"/>
        </div>
        <div id="coccinelle" class="grid-item">
          <img src="images/coccinelle.jpg" />
        </div>
        <div id="mariniere" class="grid-item">
          <img src="images/mariniere.jpg" />
        </div>
        <div id="montage" class="grid-item">
          <img src="images/montage.jpg" />
        </div>
        <div id="bonheur" class="grid-item">
          <img src="images/bonheur.jpg" />
        </div>
        <div id="alinea" class="grid-item">
          <img src="images/alinea.jpg" />
        </div>
        <div id="dartagnan" class="grid-item">
          <a href="images/dartagnan.jpg" class="swipebox" title="dartagnan">
            <img src="images/dartagnan.jpg" alt="dartagnan">
          </a>
        </div>-->
      </div>

      <div class="container">
    		<ul id="gn-menu" class="gn-menu-main">
    			<li class="gn-trigger" style="left:0">
    				<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
    				<nav class="gn-menu-wrapper">
    					<div class="gn-scroller">
    						<ul class="gn-menu">
    							<li><a href="rdv.php" class="gn-icon gn-icon-rdv">Images</a></li>
    							<li><a href="map.php" class="gn-icon gn-icon-earth">Vidéos</a></li>
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
  <script>




    //Galerie
    $( document ).ready(function() {




      // external js: masonry.pkgd.js, imagesloaded.pkgd.js
      // init Masonry after all images have loaded

			// Basic Gallery
			$( '.swipebox' ).swipebox();

			// Video
			$( '.swipebox-video' ).swipebox();

			// Dynamic Gallery
			$( '#gallery' ).click( function( e ) {
				e.preventDefault();
				$.swipebox( [
					{ href : 'http://swipebox.csag.co/mages/image-1.jpg', title : 'My Caption' },
					{ href : 'http://swipebox.csag.co/images/image-2.jpg', title : 'My Second Caption' }
				] );
			} );

      //lazy load
      $("img.lazy").lazyload();
      $("img.lazy").load(function(){
        var $grid = $('.grid').imagesLoaded( function() {
          $grid.masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
          });
        });

        $grid.on( 'layoutComplete', function( event, items ) {
          modif_zoom();
        });
      });

    });

    /*$( document ).on( "mousemove", function( event ) {
      $( "#log" ).text( "pageX: " + event.pageX + ", pageY: " + event.pageY + "largeur: " + $(window).width() );
    });*/




  </script>
</html>
