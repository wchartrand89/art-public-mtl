window.addEventListener("load", function(){
    
    let url=window.location.href;
    let aUrl=url.split("/");
    let artiste =false;
    let oeuvres =false;
    let oeuvre =false;
    let urlAjout="../";
    for(i=0; i<aUrl.length;i++){
        switch(aUrl[i]){
            case "oeuvre":
                if(aUrl[aUrl.length-1] == "oeuvre"){
                    oeuvres=true;
                }else{
                    oeuvre=true;
                }
                break;
            case "artiste":
                if(Number(aUrl[aUrl.length-1]) !== NaN){
                    artiste=true;
                }
                break;
        }
    }
    let imgOeuvre=document.querySelectorAll(".img");
        for(i=0; i<imgOeuvre.length; i++){
            if(imgOeuvre[i].dataset.img!== ""){
                if(artiste || oeuvre){
                    imgOeuvre[i].style.backgroundImage = "url('"+urlAjout+"../img/oeuvres/"+imgOeuvre[i].dataset.img+".jpg')";
                }else if(oeuvres){
                    imgOeuvre[i].style.backgroundImage = "url('../img/oeuvres/"+imgOeuvre[i].dataset.img+".jpg')";
                }
            }else{
                imgOeuvre[i].classList.add("hidden");
            }
        }
        
   
});