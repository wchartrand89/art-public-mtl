window.addEventListener("load", function()
{
    let choixListe = document.querySelector(".vueListe");
    let choixCarte = document.querySelector(".vueCarte");
    let choixImage = document.querySelector(".vueImage");
    let map = document.querySelector("#map");
    let contenu = document.querySelector(".contenu");
    let listeTexte=document.querySelector(".listeLettre");
    let filtre=document.querySelector(".filtre");
    filtre.setAttribute("id", "hidden");
    
    filtre.classList.replace("selec","cache");
    choixListe.addEventListener("click", function()
    {
        map.classList.add("hidden"); 
//        map.style.height="0px";
        contenu.classList.add("hidden");
        choixListe.classList.add("focus");
        choixCarte.classList.remove("focus");
        choixImage.classList.remove("focus");
        filtre.classList.replace("cache","selec");
        filtre.removeAttribute("id", "hidden");
        listeTexte.removeAttribute("id", "hidden");
        //listeTexte.classListe.remove("hidden");
        window.location.replace("#liste");
    });
    
    choixCarte.addEventListener("click", function()
    {
        contenu.classList.add("hidden");
//        map.style.height="500px";
        map.classList.remove("hidden");
        choixCarte.classList.add("focus");
        choixListe.classList.remove("focus");
        choixImage.classList.remove("focus");
        filtre.classList.replace("selec","cache");
        filtre.setAttribute("id", "hidden");
        listeTexte.setAttribute("id", "hidden");
        window.location.replace("#map");

    });
    
    choixImage.addEventListener("click", function()
    {
        map.classList.add("hidden"); 
//        map.style.height="0px";
        contenu.classList.remove("hidden");
        choixImage.classList.add("focus");
        choixCarte.classList.remove("focus");
        choixListe.classList.remove("focus");
        filtre.classList.replace("cache","selec");
        filtre.removeAttribute("id", "hidden");
        listeTexte.setAttribute("id", "hidden");
        window.location.replace("#photo");
    });      
    
    
//    let body=document.querySelector("body");
//    let listeLettres = Array("A", "B", "C", "D", "E","F", "G", "H", "I","J","K", "L", "M", "N", "O","P", "Q", "R", "S", "T","U","V","W","X","Y","Z");
//    let lettreChoisie=document.querySelector(".focus");
//    let lettres =document.querySelectorAll(".lettre");
//    let liste=document.querySelector(".liste");
//
//     //Au clic sur les fleches : changer les lettres
//    let fleches=document.querySelectorAll(".fleches");
//    let flecheNext=document.querySelector(".next");
//    let flechePrev=document.querySelector(".prev");
//    fleches.forEach(function(fleche){
//        fleche.addEventListener("click", function(){
//                //changer le contenu des lettres en fonction de la fleche sur laquelle l'utilisateur a cliqué
//                lettres.forEach(function(lettre){                    
//                    let change = false;
//                    for(i=0; i<27; i++){
//                        if(lettre.innerHTML===listeLettres[i] && change == false){
//                            if(fleche.classList.contains("next")){
//                                if(i === 0 ){
//                                    lettre.innerHTML=listeLettres[i+25];                           
//                                }
//                                else{
//                                    lettre.innerHTML=listeLettres[i-1];
//                                }
//                            }else{
//                                if(i==25){
//                                    lettre.innerHTML=listeLettres[0];  
//                                }
//                                else{
//                                    lettre.innerHTML=listeLettres[i+1];
//                                }
//                            }
//                            change=true;
//                        }
//                    }
//                });
//
//                //Au clic sur les fleches, changer le lien vers ancre dans la page en fonction de la lettre choisie
//                if(fleche.classList.contains("next")){
//                    flecheNext.href="#"+document.querySelector(".focus").innerHTML;
//                }else{
//                    flechePrev.href="#"+document.querySelector(".focus").innerHTML;
//                }
//        });
//    });
//    
//    
//    //au clic sur une lettre, rediriger l'url
//    lettres.forEach(function(lettre)
//    {        
//        lettre.addEventListener("click", function(){
////        console.log(lettre.innerHTML);
//        window.location.replace("#"+lettre.innerHTML);
////        change=true;
//        });
//        
//    });

});





   