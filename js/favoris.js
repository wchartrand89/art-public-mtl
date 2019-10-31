/*gérer affichage des favoris etc.*/ 

window.addEventListener("load", function(){
    let iconesFavoris =document.querySelectorAll(".favori");
    //console.log(iconesFavoris);
    iconesFavoris.forEach(function(favori){
        //console.log(favori.dataset.fav);
        if(favori.dataset.fav !=""){
            favori.innerHTML = "favorite";
        }
        favori.addEventListener("click", function(evt){
            let icone =evt.target;
            if(icone.innerHTML == "favorite_border"){
                icone.innerHTML = "favorite";
                //console.log(icone.dataset.id);
                //console.log(id);
            }else if(icone.innerHTML == "favorite"){
                icone.innerHTML = "favorite_border";
            }
            let id=icone.dataset.id;
            ajax(id);
        });
    });



    /*Fonction ajax à laquelle on envoi un tableau et qui le passe en paramètre au GET du ajax
    @param {array} data : un tableau près à être convertit en JSON
    */
    function ajax(data){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', "./favoris/"+data);
        xhr.onreadystatechange=function(){
            if(this.readyState == 4 && this.status == 200){
               
            }
        };    
        //récupérer l'id de l'oeuvre sur laquelle on a cliqué    
        //envoyer l'id et le username
        xhr.send();
    }

})