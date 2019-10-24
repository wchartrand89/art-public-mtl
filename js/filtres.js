/*gérer affichage des filtre etc.*/ 

window.addEventListener("load", function(){
   
    let iFiltre=document.querySelector(".filtre");
    let secFiltres=document.querySelector(".filtres");
    let btnSupp= document.querySelector(".btnSupp");
    let header=document.querySelector(".appbar");
    let choixAffichage=document.querySelector(".recherche");

// TESTS
    // header.classList.add("hidden");
     //choixAffichage.setAttribute("id", "hidden");
    
     /* Afficher les options de filtre au clic sur l'icone*/
    iFiltre.addEventListener("click", function(){
        //secFiltres.setAttribute("id", "visible");
        secFiltres.classList.replace("cache", "selec");
        iFiltre.classList.replace("selec", "cache");
        // iFiltre.setAttribute("id", "hidden");
        header.classList.add("hidden");
        choixAffichage.setAttribute("id", "hidden");
    });

    /* Enlever les options de filtre au clic sur l'icone croix*/
    let retour =document.querySelector(".retour i");
    retour.addEventListener("click", function(){
        //secFiltres.setAttribute("id", "hidden");
        secFiltres.classList.replace("selec", "cache");
        iFiltre.classList.replace("cache", "selec");
        header.classList.remove("hidden");
        choixAffichage.removeAttribute("id", "hidden");

        // iFiltre.setAttribute("id", "visible");

    });
    /* Au clic sur une des section de filtre, affichage des options*/


    /* Afficher "supprimer tous les filtres" si il y en a au moins un selectionné */
    btnSupp.addEventListener("click", function(){
        console.log("click");
        btnSupp.classList.replace("selec", "cache");
    });

    //Objet qui contiendra les filtres sélectionnés par l'utilisateur
    let oFiltres={};

    //créer un objet pour le filtre TYPE
    let aTypes=[];
    let filtresType=document.querySelectorAll(".type");
    filtresType.forEach(function(type){
        type.addEventListener("click", function(){
            let checkbox=type.firstElementChild;
            let check= aCheck(aTypes, type.dataset.id);
            if(check === false){
                aTypes.push(type.dataset.id);
                checkbox.innerHTML="check_box";
            }else{
                remove(aTypes, check);
                checkbox.innerHTML="check_box_outline_blank";
            };
            //convertir le tableau des types en objet
            let oTypes= convertObjet(aTypes);
            // créer un tableau contenant les différents filtres
            if(aTypes.length>0){
                btnSupp.classList.replace("cache", "selec");
            }
            ajax(oTypes);

            /* oFiltres : objet à envoyer à la fonction ajax du type : 
            {   "type" : {"0" : "0", "2" : "10"},
                "arrondissement" : {"0" : "0", "2" : "10"},
                "date" : {"0" : "0", "2" : "10"},
                etc.
            }
            */
        });
    });


    /*Fonction à qui on donne un tableau, une chaine de caractère et un objet qui :
    vérifie si l'objet contient déja un objet appelé comme la chaine de caractère, et en fonction :
    y met le tableau, remplace les données ou le supprime de l'objet.
    @param {array} array : tableau contenant les id des éléments choisis par l'utilisateurs
    @param {string} filtre : string ayant pour valeur "type", "arrondissement", ou "date"
    @param {object} objet : objet
    */
    function creationTabFiltres(filtre, array, objet){
        switch(filtre){
            case "type" : 
                break;
            case "arrondissement":
                break;
            case "date":
                break;
        }
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
        if(!isNaN(id)){
            for(i=0; i<array.length; i++){
                if(array[i]===id){
                    test= true;
                    index= i;
                }
            }
        }
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