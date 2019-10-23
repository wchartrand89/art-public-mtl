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
        // window.location.replace("#liste");
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
        // window.location.replace("#map");

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
        // window.location.replace("#photo");
    });      

});





   