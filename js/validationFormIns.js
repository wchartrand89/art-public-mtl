window.addEventListener("load", function(){

    let btnEnvoiIns=document.getElementById('envoyer');
    console.log(btnEnvoiIns);

    
    
    // FORMULAIRE INSCRIPTION
    btnEnvoiIns.addEventListener("click", function(){
        console.log("test");
        
        let form=document.getElementById("inscription");
        let email = document.getElementById("mail").value;
        console.log(email);
        let login = document.getElementById("login").value;
        console.log(login);
        let mdp = document.getElementById("mdp").value;
        let mdpConfirm = document.getElementById("mdpConfirm").value;
    let Regex = new RegExp("/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/");
        let match = email.match(Regex);
        if(match){
            console.log('teeeeee');
            }
        
        

//        event.preventDefault();
    })

});