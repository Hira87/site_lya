function pagine(page,limit){
  $.ajax({
      type: "POST",
      url: "/save.php",
      data: "type=pagine&page=" + page + "&limit=" + limit,
      dataType: 'JSON',
      success: function (html) {
          //console.log(html.response + ' ' + html.username);
          if (html.response === 'true') {
              //location.assign("../index.php");
             location.reload();
              return html.username;
          } else {
              $("#message").html(html.response);
          }
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
