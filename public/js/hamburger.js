$(document).ready(function () {
    $('#hamburgercheckbox').change(function(){
        if($(this).is(':checked')){
            let hamburgericon = $('#hamburgericon')
              if(hamburgericon.find('menu')){
                $("#hamburgericon").empty();
                $("#hamburgericon").html("menu_open");
                $(".mobile-dashboard-nav").addClass("slide");
              }
            } else {
                $(".mobile-dashboard-nav").removeClass("slide");
                $("#hamburgericon").empty();
                $("#hamburgericon").html("menu");
            }

    });





});
