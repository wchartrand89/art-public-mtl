window.addEventListener("load", function(){
    let menu = document.querySelector(".menu");
    let iconeMenu=document.querySelector(".menuCubes");
    let iconeFermer=document.querySelector(".fermerMenu");
    let langue=document.querySelector(".langue");
    let recherche=document.querySelector(".search");

    iconeMenu.addEventListener("click", function(){
        menu.classList.remove("hidden");
        langue.classList.remove("hidden");
        iconeMenu.classList.add("hidden");
        iconeFermer.classList.remove("hidden");
        recherche.classList.add("hidden");

    })
    iconeFermer.addEventListener("click", function(){
        menu.classList.add("hidden");
        langue.classList.add("hidden");
        iconeMenu.classList.remove("hidden");
        iconeFermer.classList.add("hidden");
        recherche.classList.remove("hidden");

    })


});