<html>
  <head>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <h1>Masonry - imagesLoaded callback</h1>

      <div class="grid">
        <div class="grid-sizer"></div>
        <div class="grid-item">
          <img src="images/dartagnan.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/tipi.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/nous3.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/coccinelle.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/mariniere.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/montage.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/bonheur.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/alinea.jpg" />
        </div>
        <div class="grid-item">
          <img src="images/dartagnan.jpg" />
        </div>
      </div>

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
  </script>
</html>
