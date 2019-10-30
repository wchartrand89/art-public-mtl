/*gérer affichage des filtre etc.*/ 

window.addEventListener("load", function(){
   
    let iFiltre=document.querySelector(".filtre");
    let secFiltres=document.querySelector(".filtres");
    let btnSupp= document.querySelector(".btnSupp");
    let header=document.querySelector(".appbar");
    let choixAffichage=document.querySelector(".recherche");
    
     /* Afficher les options de filtre au clic sur l'icone*/
    iFiltre.addEventListener("click", function(){
        secFiltres.classList.replace("cache", "selec");
        iFiltre.classList.replace("selec", "cache");
        header.classList.add("hidden");
        choixAffichage.setAttribute("id", "hidden");
    });

    /* Enlever les options de filtre au clic sur l'icone croix*/
    let retour =document.querySelector(".retour i");
    retour.addEventListener("click", function(){
        secFiltres.classList.replace("selec", "cache");
        iFiltre.classList.replace("cache", "selec");
        header.classList.remove("hidden");
        choixAffichage.removeAttribute("id", "hidden");
    });
    /* Au clic sur une des section de filtre, affichage des options*/


    /* Afficher "supprimer tous les filtres" si il y en a au moins un selectionné */
    btnSupp.addEventListener("click", function(){
        console.log("click");
        btnSupp.classList.replace("selec", "cache");
    });

    //Objet qui contiendra les filtres sélectionnés par l'utilisateur
    let oFiltres={};
    let aTypes=[];
    let aArrond=[];
    let filtres=document.querySelectorAll(".critere");
    filtres.forEach(function(critere){
        critere.addEventListener("click", function(){
            let checkbox=critere.firstElementChild;
            let check;
            switch(critere.dataset.filtre){
                case "type":
                    check= aCheck(aTypes, critere.dataset.id);
                    aTypes= replaceTab(aTypes, critere.dataset.id, check);
                    break;
                case  "arrondissement":
                    check= aCheck(aArrond, critere.dataset.id);
                    aArrond= replaceTab(aArrond, critere.dataset.id, check);
                    break;
            }
            if(check === false){
                //aTypes.push(critere.dataset.id);
                checkbox.innerHTML="check_box";
            }else{
                //remove(aTypes, check);
                checkbox.innerHTML="check_box_outline_blank";
            }

            //afficher ou non le bouton pour suprimer les filtres
            if(aTypes.length>0 || aArrond.length>0){
                btnSupp.classList.replace("cache", "selec");
            }else{
                btnSupp.classList.replace("selec", "cache");
            }

            //convertir le tableau des types en objet
            
            
            
            
            // créer un tableau contenant les différents filtres

            let oFiltres={};
            if(aTypes.length>0){
                let oTypes= convertObjet(aTypes);
                oFiltres.type=oTypes;
                console.log(oTypes);
            }
            if(aArrond.length>0){
                let oArrond= convertObjet(aArrond);
                oFiltres.arrondissement=oArrond;
                console.log(oArrond);
            }
            console.log(oFiltres);
            //oFiltres=JSON.stringify(oFiltres);
            console.log(oFiltres);
            ajax(oFiltres);
            
            
        });
    });

    /*Fonction à qui on donne un tableau et qui le convertit en objet
        @param {array} array 
        @return {object} objet 
        */
    function replaceTab(array, contenu, check){
        if(check === false){
           array.push(contenu);
        }else{
            remove(array, check);
        }
        return array;
    }

   /*Fonction à qui on donne un tableau et qui le convertit en objet
    @param {array} array 
    @return {object} objet 
    */
    function convertObjet(array){
        let objet= Object.assign({}, array);
        return objet;
    }

    
    /*
    Fonction a qui l'on donne un objet et qui renvoi true si il l'est ou false si il ne l'est pas.
    @param {object} objet : objet à vérifier
    @return {bool} : true si l'objet est vide, false si il ne l'est pas

    SOURCE : https://coderwall.com/p/_g3x9q/how-to-check-if-javascript-object-is-empty
    */
    function isEmpty(obj) {
        for(var prop in obj) {
            if(obj.hasOwnProperty(prop))
                return false;
        }

        return true;
    }

    /*Fonction qui fait apparaître un bouton
    @param {bool} bool : true si il y a des options de tri choisies, false si il n'y en a aucunes
    */
    function suppOption(bool){
        if(bool){
            /* Afficher le bouton "supprimer les options" */ 
            btnSupp.classList.replace("cache", "selec");

        }else{
            /* Afficher le bouton "supprimer les options" */ 
            btnSupp.classList.replace("cache", "selec");
        }
    }

    /*Fonction ajax à laquelle on envoi un tableau et qui le passe en paramètre au POST du ajax
    @param {array} data : un tableau près à être convertit en JSON
    */
    function ajax(data){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', "./filtre");
        xhr.onreadystatechange=function(){
            if(this.readyState == 4 && this.status == 200){
                let oeuvres= document.querySelectorAll(".oeuvre");
                oeuvres.forEach(function(oeuvre){
                    if(!isEmpty(xhr.responseText)){
                        let aOeuvresFiltre= JSON.parse(xhr.responseText);
                        console.log(aOeuvresFiltre);
                        let trouve = false;
                        aOeuvresFiltre.forEach(function(id){
                            if(oeuvre.dataset.id == id.id){
                                trouve=true;
                            }
                        });
                        if(!trouve){
                            oeuvre.setAttribute("id", "hidden");
                        }else{
                            oeuvre.removeAttribute("id");
                        }
                    }else{
                        oeuvre.removeAttribute("id");
                    }
                });
            }
        };
        xhr.setRequestHeader("Content-Type", "application/json");
        /*envoyer un objet json donnant les filtres choisis*/
        
        let test =JSON.stringify(data);
        console.log(data);
        console.log(test);
        xhr.send(test);
    }
    

    /*Fonction à laquelle on envoi un tableau et un id, 
    qui vérifie si l'id est dans le tableau 
    @param {array} tableau : le tableau à vérifier
    @param {integer} id : l'id à insérer ou retirer du tableau
    @return {bool/integer} index : false si l'id n'existe pas dans le tableau, ou sa position dans le tableau
    */
    function aCheck(array, id){
        let test =false;
        let index =false;
        //if(!isNaN(id)){
            for(i=0; i<array.length; i++){
                if(array[i]===id){
                    test= true;
                    index= i;
                }
            }
        //}
        return index;
    }
    /*Fonction à laquelle on envoi un tableau et un entier, 
        qui enlève du tableau l'élément à la position de l'entier envoyé
        @param {array} array : le tableau à manipuler
        @param {integer} i : la position de l'élément à supprimer dans le tableau
        */
    function remove(array, i){
        array.splice(i, 1);
    }
 

})