
$(document).ready(function () {
    let fileInput = document.querySelector('#input');
    let dropArea = document.querySelector('#dropimagehere')
    let thumbnail = document.querySelector("#dropimagethumbnail");
    let borderDrop = document.querySelector("#borderdropimage")
    let file
    $("#dropimagehere").on('dragover',function(event){
    event.preventDefault();
     $("#borderdropimage").removeClass("border-dashed");
})

$("#dropimagehere").on('dragleave',function(event){
    event.preventDefault()
    $("#borderdropimage").addClass(".border-dashed");
})
fileInput.addEventListener("change",(event) => {
    event.preventDefault();
    if(!borderDrop.classList.contains("border-dashed")){
        borderDrop.classList.add("border-solid")
        borderDrop.classList.remove("border-dashed");
    } else {
        borderDrop.classList.remove("border-dashed");
        borderDrop.classList.add("border-solid")
    }
    file = event.dataTransfer.files[0];
    showFile();
})


dropArea.addEventListener("drop",(event) => {
    event.preventDefault();
    if(!dropArea.classList.contains("border-dashed")){
        borderDrop.classList.add('border-solid"')
        borderDrop.classList.remove("border-dashed");
    } else {
        borderDrop.classList.remove("border-dashed");
        borderDrop.classList.add('border-solid"')
    }
    file = event.dataTransfer.files[0];
    showFile();
})




function showFile(){
    let fileType = file.type;
    let validExtensions = ["image/jpeg","image/jpg","image/png"];
    if(validExtensions.includes(fileType)){
        let fileReader = new FileReader();
        fileReader.onload = ()=> {
            let fileURL = fileReader.result;
            let imgTag = `<img src="${fileURL}" alt="image" class="object-cover">`
            thumbnail.innerHTML = imgTag;
        }
        fileReader.readAsDataURL(file);
    } else {
        file = ""
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'File Bukan Gambar',
          })

       $("#borderdropimage").addClass("border-dashed");

    }
}

});

// const tablerows = document.getElementsByClassName('table-rows');
// for (const tbrow of tablerows) {
//     $('.copy-button').on('click', function(e) {
//        let singletbrow = tbrow.querySelector('#image-id')
//        let tbrows = tbrow.querySelector('#image-id').innerText
//        if($(this).attr("id") == tbrows){
//          let singletbrowvalue = singletbrow.parentNode.querySelector('#image-url').getAttribute('title')
//          try {
//          var retVal = navigator.clipboard.writeText(singletbrowvalue);
//           tippy('.copy-button', {
//             content: 'Copied!',
//             trigger:'click'
//           });

//         } catch(err){
//              console.log(err)
//         }
//     }

// });



// }






const tablerows = document.getElementsByClassName('table-rows');
for (const tbrow of tablerows) {
    $('.copy-button').on('click', function(e) {
       let singletbrow = tbrow.querySelector('#image-id')
       let tbrows = tbrow.querySelector('#image-id').innerText
       if($(this).attr("id") == tbrows){
         let singletbrowvalue = singletbrow.parentNode.querySelector('#images-url')
         singletbrowvalue.select();
         singletbrowvalue.setSelectionRange(0, 99999);
         try {
         var retVal = document.execCommand("copy");
          tippy('.copy-button', {
            content: 'Copied!',
            trigger:'click'
          });

        } catch(err){
             console.log(err)
        }
    }

});



}




