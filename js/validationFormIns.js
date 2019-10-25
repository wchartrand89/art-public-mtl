window.addEventListener("load", function(){

    let btnEnvoiIns=document.getElementById('envoyer');
    console.log(btnEnvoiIns);

    
    
    // FORMULAIRE INSCRIPTION
    btnEnvoiIns.addEventListener("click", function(event){

        let mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
        let form=document.getElementById("inscription");
        let email = document.getElementById("mail").value;
        let login = document.getElementById("login").value;
        let mdp = document.getElementById("mdp").value;
        let mdpConfirm = document.getElementById("mdpConfirm").value;

        if(mdp==mdpConfirm)
        {
            if(mdp.match(mediumRegex))
            {
              form.submit(); 
            }
            else
            {
                document.getElementById("msgErreurRegex").innerHTML="Votre mot de passe doit contenir au moins 8 caractères, une majusucule, une minuscule et un chiffre.";
               event.preventDefault();
            }
        }
        else
        {
            document.getElementById("msgErreurConfirm").innerHTML="Vous devez confirmer votre mot de passe.";
            event.preventDefault();
        }
    })

});