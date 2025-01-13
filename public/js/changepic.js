$(document).ready(function() {
$("#btnChangePic").on("click",function(){
    if($(".upload-wrappers").hasClass('hidden')){
       $(".upload-wrappers").removeClass('hidden');
       $(".upload-wrappers").addClass('block')
       $("#backdrop").removeClass('hidden')
       $("#backdrop").addClass("block")
   } else {
       $(".upload-wrappers").removeClass('block');
       $(".upload-wrappers").addClass('hidden')
       $("#backdrop").addClass('hidden')
       $("#backdrop").removeClass("block")
   }

})

$("#backdrop").on("click",function(){
    $(".upload-wrappers").removeClass('block');
    $(".upload-wrappers").addClass('hidden')
    $("#backdrop").addClass('hidden')
    $("#backdrop").removeClass("block")
})



});
