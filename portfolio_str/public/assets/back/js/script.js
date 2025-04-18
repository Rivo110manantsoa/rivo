let popup = document.querySelector("#create-staff");

function show_popup(){
    popup.style.display = "flex";
}
function exit_popup(){
    popup.style.display = "none";
}
window.onscroll = ()=>{
    popup.style.display = "none";
}

// add in portfolio

function  clear_fields(){    

    let title = document.querySelector("#title").value = "";
    let description = document.querySelector("#description").value = "";
    let image1 = document.querySelector("#image1").value = "";
    let image2 = document.querySelector("#image2").value = "";
    let image3 = document.querySelector("#image3").value = "";
    let image4 = document.querySelector("#image4").value = "";
    let image5 = document.querySelector("#image5").value = "";

}


function collect_data(e){

    let data = new FormData();

    let title = document.querySelector("#title");
    let description = document.querySelector("#description");
    let image1 = document.querySelector("#image1");
    let image2 = document.querySelector("#image2");
    let image3 = document.querySelector("#image3");
    let image4 = document.querySelector("#image4");
    let image5 = document.querySelector("#image5");

    // validation
    if (title.value.trim() == "" || !isNaN(title.value.trim())) {
        alert("Please inter a valid title");
        return;
    }
    if (description.value.trim() == "" || !isNaN(description.value.trim())) {
        alert("Please inter a valid description");
        return;
    }
    if (image1.files.length == 0) {
        alert("please upload an image first");
    }
    if (image2.files.length > 0) {
        data.append('image2',image2.files[0]);
    }
    if (image3.files.length > 0) {
        data.append('image3',image3.files[0]);
    }
    if (image4.files.length > 0) {
        data.append('image4',image4.files[0]);
    }
    if (image5.files.length > 0) {
        data.append('image5',image5.files[0]);
    }

    data.append('title',title.value.trim());
    data.append('description',description.value.trim());
    data.append('data_type','add_portfolio');
   
    send_data_files(data);

   
}

function send_data_files(formdata){
    let ajax = new XMLHttpRequest();
    ajax.addEventListener("readystatechange",function(){
        if (ajax.readyState == 4 && ajax.status == 200) {
            handle_result(ajax.responseText);
        }
    });
    
    ajax.open("POST",'<?=ROOT?>ajax_portfolio',true);
    ajax.send(formdata);
}



function handle_result(result){
    console.log(result);
    if (result != "") {
        let obj = JSON.parse(result);
        if (typeof obj.message != "undefined" ) {
            if (obj.data_type == "add_portfolio") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();
                    clear_fields();
                } else {
                    alert(obj.message);
                }
            }
        }
    }
}

function show_image(file_type,filename,element){
    let index = 0;
    if (filename == "image2") {
        index = 1;  
    } else
    if (filename == "image3") {
        index = 2;  
    } else
    if (filename == "image4") {
        index = 3;  
    } else
    if (filename == "image5") {
        index = 4;  
    } 

    let image_holders = document.querySelector("."+element);
    let images =image_holders.querySelectorAll("IMG");
    images[index].src = URL.createObjectURL(file_type);
    
}