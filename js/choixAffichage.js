window.addEventListener("load", function()
{
    let choixListe = document.querySelector(".vueListe");
    let choixCarte = document.querySelector(".vueCarte");
    let choixImage = document.querySelector(".vueImage");
    let map = document.querySelector("#map");
    let contenu = document.querySelector(".contenu");
    let listeTexte=document.querySelector(".listeLettre");
    let oeuvresTexte=document.querySelectorAll(".oeuvreTxt");
    let oeuvresPhoto1=document.querySelectorAll(".image_oeuvre_courante");
    let oeuvresPhoto2=document.querySelectorAll(".texte_pied_image");
    let filtre=document.querySelector(".filtre");
    filtre.setAttribute("id", "hidden");
    
    filtre.classList.replace("selec","cache");

    oeuvresTexte.forEach(function(texte){
        texte.classList.add("hidden");
    });
   
    choixListe.addEventListener("click", function()
    {
        map.classList.add("hidden"); 
//        map.style.height="0px";
        contenu.classList.remove("hidden");
        choixListe.classList.add("focus");
        choixCarte.classList.remove("focus");
        choixImage.classList.remove("focus");
        filtre.classList.replace("cache","selec");
        filtre.removeAttribute("id", "hidden");
        listeTexte.removeAttribute("id", "hidden");
        oeuvresTexte.forEach(function(texte){
            texte.classList.remove("hidden");
        });
        oeuvresPhoto1.forEach(function(photo){
            photo.setAttribute("id", "hidden");
        });
        oeuvresPhoto2.forEach(function(photo){
            photo.setAttribute("id", "hidden");
        });


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
        oeuvresTexte.forEach(function(texte){
            texte.classList.add("hidden");
        });
        oeuvresPhoto1.forEach(function(photo){
            photo.classList.removeAttribute("id", "hidden");
        });
        oeuvresPhoto2.forEach(function(photo){
            photo.classList.removeAttribute("id", "hidden");
        });
        // window.location.replace("#photo");
    });      

});





   