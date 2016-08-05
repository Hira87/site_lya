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
