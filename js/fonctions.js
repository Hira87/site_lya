function enleve_active(page){
  alert('enleve_active');
  $.each($('.pagination li a'), function(index,value){
    if($(this).attr('class') == 'active' && $(this).attr('id') != page){
      $('#'+$(this).attr('id')).removeClass('active');
      if(page == 'previous'){
        page_prec = parseInt(parseInt($(this).attr('id'))-1);
        $('#'+page_prec).addClass('active');
        return false;
      }
      if(page == 'next'){
        page_suiv = parseInt(parseInt($(this).attr('id'))+1);
        $('#'+page_suiv).addClass('active');
        alert(page_suiv);
        return false;
      }
    }
  });
  //return id_active;
}

function pagine(page,limit){
  $.ajax({
      type: "POST",
      url: "save.php",
      data: "type=pagine&page=" + page + "&limit=" + limit,
      //dataType: 'JSON',
      success: function (data) {
        enleve_active(page);
        if(page != 'previous' && page != 'next'){
          $("#"+page).addClass("active");
        }

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
