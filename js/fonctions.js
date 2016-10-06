function cherche_active(){
  $.each($('.pagination li a'), function(index,value){
    console.log($(this).attr('class'));
  });
  //return id_active;
}

function pagine(page,limit){
  page_prec = parseInt(parseInt(page)-1);
  $.ajax({
      type: "POST",
      url: "save.php",
      data: "type=pagine&page=" + page + "&limit=" + limit,
      //dataType: 'JSON',
      success: function (data) {
        $("#"+page).addClass("active");
        cherche_active();
        //$("#"+page_prec).removeClass("active");
        $("#images").html(data);
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
      },
      error: function (textStatus, errorThrown) {
          console.log(textStatus);
          console.log(errorThrown);
      },
      /*beforeSend: function () {
          $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
      }*/
  });
}

function modif_zoom(){
  $( ".grid-item" ).each(function( index ) {
    /*console.warn($( this ).children().attr("src")+" = "+parseInt($( this ).css( "left" ))+" >= "+($( window ).width()*40/100));*/
    if(parseInt($( this ).css( "left" ))>=($( window ).width()*40/100)){
      $( this ).removeClass("zoom-left");
      $( this ).addClass("zoom-right");
    }else{
      $( this ).removeClass("zoom-right");
      $( this ).addClass("zoom-left");
    }
  });
}

/*function deplace_affichage(id){
  window.location.hash = '#'+id;
}*/
