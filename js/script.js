let divs = ["open1", "open2", "open3", "open4"];
let visibleId = null;

function show(id) {
    if(visibleId !== id){
        visibleId = id;
    }
    hide();
}

function hide(e){
    let div, i, id;
    for(i = 0; i< divs.length; i++) {
        id = divs[i];
        div = document.getElementById(id);
        if(visibleId === id){
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
}





