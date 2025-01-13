
$(document).ready(function () {
    $("#default-search").on('keyup',function(){
        let searchQuest = $(this).val();
        var url = window.location.pathname
        $.ajax({
            method: 'get',
            url: url,
            dataType: 'json',
            data: {
                "searchQuest" : searchQuest,
                "_token" : $('#token').val()
            },
            success: (data) => {
                let norecentmsg = "No Recent Searches"
                if(searchQuest == ""){
                    $('#result').html(norecentmsg)
                } else {
                    $('#results').html(data)
                }


          }
        })

    })

})

