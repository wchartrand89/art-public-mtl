window.addEventListener("load", function(){
    
    let url=window.location.href;
    let aUrl=url.split("/");
    let artiste =false;
    let oeuvres =false;
    let oeuvre =false;
    let urlAjout="../";
    console.log(aUrl);
    for(i=0; i<aUrl.length;i++){
        switch(aUrl[i]){
            case "oeuvre":
                console.log(aUrl[aUrl.length-1]);
                if(aUrl[aUrl.length-1] == "oeuvre"){
                    oeuvres=true;
                }else{
                    oeuvre=true;
                }
                break;
            case "artiste":
                console.log(Number.isInteger(aUrl[aUrl.length-1]));
                if(Number(aUrl[aUrl.length-1]) !== NaN){
                    artiste=true;
                }
                break;
        }
    }

    console.log("artiste"+artiste);
    console.log("oeuvre"+oeuvre);
    console.log("oeuvres"+oeuvres);
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