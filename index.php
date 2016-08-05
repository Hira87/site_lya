<!DOCTYPE html>
<html lang="fr" class="no-js">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/fonctions.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="GoogleNexusWebsiteMenu/css/component.css" />
		<script src="GoogleNexusWebsiteMenu/js/modernizr.custom.js"></script>
  </head>
  <body>

    <h1>&nbsp;</h1>

      <div class="grid">
        <div class="grid-sizer"></div>
        <div id="dartagnan" class="grid-item">
          <img src="images/dartagnan.jpg"/>
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
          <img src="images/dartagnan.jpg" />
        </div>
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
							<!--<li><a href="stat.php" class="gn-icon gn-icon-article">Statistique</a></li>-->
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
    // external js: masonry.pkgd.js, imagesloaded.pkgd.js

    // init Masonry after all images have loaded
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



  </script>
</html>
