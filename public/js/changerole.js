$(document).ready(function() {
    $('#changeroleselect').on('change',function(){
       let valueselect = $(this).val()
       var url = window.location.pathname
       $.ajax({
        method: 'get',
        url: url,
        dataType: 'json',
        data : {
            "valueselect" : valueselect,
            "_token" : $('#token').val()
        }
       })
     })
})

