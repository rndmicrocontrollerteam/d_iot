$('#addnewcategories').on('click',()=>{

    let clone = $('#inputcategory').clone(true);
    $('.category-input ').after(clone)
    let categoryevery =  $('.category-everies')
    if(categoryevery.length > 2){
       $("#addnewcategories").addClass("hidden")
    }

});
