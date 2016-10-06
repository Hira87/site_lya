<?php
  require "login/loginheader.php";
  require_once('fonctions.php');


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

    <!-- lazy loader pour charger les images progressivement
    <script src="js/jquery.lazyload.min.js"></script>-->
  </head>
  <body>

    <h1>&nbsp;</h1>

    <?php
      $limit = 30;
      $sql_pagination = "Select * from images";
      $res_pagination = $pdo->query($sql_pagination);
      $nb_images = $res_pagination->rowCount();
      $res_pagination->closeCursor();
      $nb_pages = ceil($nb_images/$limit);
      if($nb_pages>2){
        $type_pagination = "FULL";
      }else if($nb_pages>1){
        $type_pagination = "SMALL";
      }else{
        $type_pagination = "NONE";
      }

      $pagination = '<div class="center">
                      <ul class="pagination">';

      if($type_pagination == "FULL"){
        $pagination .= '<li><a href="#">&lt;&lt;</a></li>
                        <li><a href="#">&lt;</a></li>';
      }else if($type_pagination == "SMALL") {
        $pagination .= '<li><a href="#">&lt;</a></li>';
      }

      for($i=1;$i<=$nb_pages;$i++){
        if($page=='' && $i==1){
            $pagination .= '<li><a href="#" class="active">'.$i.'</a></li>';
        }else{
          $pagination .= '<li><a onclick="pagine('.$i.','.$limit.')">'.$i.'</a></li>';
        }
      }

      if($type_pagination == "FULL"){
        $pagination .= '<li><a href="#">&gt;</a></li>
                        <li><a href="#">&gt;&gt;</a></li>';
      }else if($type_pagination == "SMALL") {
        $pagination .= '<li><a href="#">&gt;</a></li>';
      }

      $pagination .='</ul></div>';

      echo $pagination;
    ?>

      <div class="grid">
        <div class="bord"></div>
        <div class="grid-sizer"></div>
        <div id="images">
        <?php
          echo genere_grid_images(1,$limit)
        ?>
      </div>
      </div>

      <div class="container">
    		<ul id="gn-menu" class="gn-menu-main">
    			<li class="gn-trigger" style="left:0">
    				<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
    				<nav class="gn-menu-wrapper">
    					<div class="gn-scroller">
    						<ul class="gn-menu">
    							<li><a href="index.php" class="gn-icon gn-icon-photo">Photos</a></li>
    							<li><a href="video.php" class="gn-icon gn-icon-video">Vidéos (A venir)</a></li>
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
      //$("img.lazy").lazyload();
      //$("img.lazy").load(function(){
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
      //});

    });

    /*$( document ).on( "mousemove", function( event ) {
      $( "#log" ).text( "pageX: " + event.pageX + ", pageY: " + event.pageY + "largeur: " + $(window).width() );
    });*/




  </script>
</html>
