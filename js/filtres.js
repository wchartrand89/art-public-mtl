/*gérer affichage des filtre etc.*/ 


window.addEventListener("load", function(){
    console.log("filtres");
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
    let test =JSON.stringify({id:"un truc"});
    console.log(test);
    xhr.send(test);
})