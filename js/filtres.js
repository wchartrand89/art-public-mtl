/*gérer affichage des filtre etc.*/ 

window.addEventListener("load", function(){
    //créer un objet pour le filtre TYPE
    let aTypes=[];
    let filtresType=document.querySelectorAll(".type");
    //console.log(filtresType);
    filtresType.forEach(function(type){
        type.addEventListener("click", function(){
            
            aTypes= aCheck(aTypes, type.dataset.id);
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
                console.log(xhr.responseText);
                //console.log(JSON.parse(evt.target.response));
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
    l'enlève si il y était déja
    l'ajoute si il n'y était pas.
    @param {array} tableau : le tableau à vérifier
    @param {integer} id : l'id à insérer ou retirer du tableau
    @return {array} tableauUp : la tableau updaté
    */
    function aCheck(array, id){
        let test =false;
        if(!isNaN(id)){
            for(i=0; i<array.length; i++){
                if(array[i]==id){
                    array.splice(i, 1);
                    test= true;
                }
            }
            if(!test){
                array.push(id);
            }
        }
        return array;
    }


})