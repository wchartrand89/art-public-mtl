window.addEventListener("load", function()
{
    let choixListe = document.querySelector(".vueListe");
    let choixImage = document.querySelector(".vueImage");
    let contenu = document.querySelector(".contenu");
    let listeTexte=document.querySelector(".listeLettre");
    let filtre=document.querySelector(".filtre");
    
    choixListe.addEventListener("click", function()
    {
        contenu.classList.add("hidden");
        choixListe.classList.add("focus");
        choixImage.classList.remove("focus");
        //filtre.classList.replace("cache","selec");
        //filtre.removeAttribute("id", "hidden");
        listeTexte.removeAttribute("id", "hidden");
        //listeTexte.classListe.remove("hidden");
        // window.location.replace("#liste");
    });

    choixImage.addEventListener("click", function()
    {
        //map.classList.add("hidden"); 
//        map.style.height="0px";
        contenu.classList.remove("hidden");
        choixImage.classList.add("focus");
        //choixCarte.classList.remove("focus");
        choixListe.classList.remove("focus");
        //filtre.classList.replace("cache","selec");
        //filtre.removeAttribute("id", "hidden");
        listeTexte.setAttribute("id", "hidden");
        // window.location.replace("#photo");
    });      

});


