$(document).ready(function () {
    $("#submits").attr("disabled",true);
    $("#passwords").on('keyup',function(){
    let valuepassword =  $(this).val()
    $("#confirmpasswords").on('keyup',function(){
    let confirmvalue =  $(this).val()

   if(valuepassword != confirmvalue){
       $("#submits").attr("disabled",true);
       $("#message").show()
       $("#message").text("Password Tidak Cocok!")
    } else if ( valuepassword == "" && confirmvalue == "") {
      $("#message").hide()
      $("#submits").attr("disabled",true);
    } else {
      $("#submits").removeAttr("disabled");
      $("#message").empty()
    }


   });
   });



});
