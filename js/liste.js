window.addEventListener("load", function(){
    let body=document.querySelector("body");
    let listeLettres = Array("A", "B", "C", "D", "E","F", "G", "H", "I","J","K", "L", "M", "N", "O","P", "Q", "R", "S", "T","U","V","W","X","Y","Z");
    let lettreChoisie=document.querySelector(".focus:not(.material-icons)");
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
    
    
    //au clic sur une lettre, rediriger l'url et changer l'affichage des lettres
    lettres.forEach(function(lettreClick)
    {    
        lettreClick.addEventListener("click", function(element)
        {
            function nextChar(c) 
            {
                if(c=='Z')
                {
                    return 'A';
                }
                else
                {
                    return String.fromCharCode(c.charCodeAt(0) + 1);
                }
            }
            function prevChar(c) 
            {
                if(c=='A')
                {
                    return 'Z';
                }
                else
                {
                    return String.fromCharCode(c.charCodeAt(0) - 1);
                }
            }
            function nextChar2(c) 
            {
                if(c=='Z'){
                    return 'B';
                }
                else if(c=='Y')
                {
                    return 'A';
                }
                else
                {
                    return String.fromCharCode(c.charCodeAt(0) + 2);
                }
            }
            function prevChar2(c) 
            {
                if(c=='A'){
                    return 'Y';
                }
                else if(c=='B')
                {
                    return 'Z';
                }
                else
                {
                    return String.fromCharCode(c.charCodeAt(0) - 2);
                }
            }
            function sameChar(c) 
            {
                return String.fromCharCode(c.charCodeAt(0));
            }
            
            var pos1 = prevChar2(lettreClick.innerHTML);
            var pos2 = prevChar(lettreClick.innerHTML);
            var pos3 = sameChar(lettreClick.innerHTML);
            var pos4 = nextChar(lettreClick.innerHTML);
            var pos5 = nextChar2(lettreClick.innerHTML);
                    
            lettres[0].innerHTML = pos1;
            lettres[1].innerHTML = pos2;
            lettreChoisie.innerHTML = pos3;
            lettres[3].innerHTML = pos4;
            lettres[4].innerHTML = pos5;
                    
            window.location.replace("#"+pos3);

        });
        
    });

});
