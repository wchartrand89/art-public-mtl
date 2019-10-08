window.addEventListener("load", function(){
    let body=document.querySelector("body");
    let listeLettres = Array("A", "B", "C", "D", "E","F", "G", "H", "I","J","K", "L", "M", "N", "O","P", "Q", "R", "S", "T","U","V","W","X","Y","Z");
    let lettreChoisie=document.querySelector(".focus");
    let lettres =document.querySelectorAll(".lettre");
    let liste=document.querySelector(".liste");

     //Au clic sur les fleches : changer les lettres
    let fleches=document.querySelectorAll(".fleches");
    let flecheNext=document.querySelector(".next");
    let flechePrev=document.querySelector(".prev");
    fleches.forEach(function(fleche){
        fleche.addEventListener("click", function(){
                //changer le contenu des lettres en fonction de la fleche sur laquelle l'utilisateur a cliqué
                lettres.forEach(function(lettre){
                    let change = false;
                    for(i=0; i<27; i++){
                        if(lettre.innerHTML===listeLettres[i] && change == false){
                            if(fleche.classList.contains("next")){
                                if(i === 0 ){
                                    lettre.innerHTML=listeLettres[i+25];                           
                                }
                                else{
                                    lettre.innerHTML=listeLettres[i-1];
                                }
                            }else{
                                if(i==25){
                                    lettre.innerHTML=listeLettres[0];  
                                }
                                else{
                                    lettre.innerHTML=listeLettres[i+1];
                                }
                            }
                            change=true;
                        }
                    }
                });

                //Au clic sur les fleches, changer le lien vers ancre dans la page en fonction de la lettre choisie
                if(fleche.classList.contains("next")){
                    flecheNext.href="#"+document.querySelector(".focus").innerHTML;
                }else{
                    flechePrev.href="#"+document.querySelector(".focus").innerHTML;
                }
        });
    });


});





   