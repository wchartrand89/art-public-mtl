/*gérer affichage des filtre etc.*/ 

window.addEventListener("load", function(){
    /* Afficher les options de filtre au clic sur l'icone*/
    let iFiltre=document.querySelector(".filtre");
    let secFiltres=document.querySelector(".filtres");

    iFiltre.addEventListener("click", function(){
        console.log(secFiltres.attributes[1].nodeValue);
        if(secFiltres.attributes[1].nodeValue == "visible"){
            secFiltres.setAttribute("id", "hidden");
        }else{
            secFiltres.setAttribute("id", "visible");
            iFiltre.setAttribute("id", "hidden");
        }
        
    });

    /* Enlever les options de filtre au clic sur l'icone croix*/
    let retour =document.querySelector(".retour i");
    retour.addEventListener("click", function(){
        console.log("retour");
        secFiltres.setAttribute("id", "hidden");
        iFiltre.setAttribute("id", "visible");

    });
    /* Au clic sur une des section de filtre, affichage des options*/


    /* Afficher "supprimer tous les filtres" si il y en a au moins un selectionné */


    //créer un objet pour le filtre TYPE
    let aTypes=[];
    let filtresType=document.querySelectorAll(".type");
    //console.log(filtresType);
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
            ajax(aTypes);
            console.log(aTypes);
        });
        
    });


    /*Fonction ajax à laquelle on envoi un tableau et qui le passe en paramètre au POST du ajax
    @param {array} data : un tableau près à être convertit en JSON
    */
    function ajax(data){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', "./filtre");
        xhr.onreadystatechange=function(){
            if(this.readyState == 4 && this.status == 200){
                let aOeuvresfiltre= JSON.parse(xhr.responseText);
                for(i=0; i<aOeuvresfiltre.length; i++){
                    
                }
            }
            
        };
        xhr.setRequestHeader("Content-Type", "application/json");
        /*envoyer un objet json donnant les filtres choisis*/
        let test =JSON.stringify(data);
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