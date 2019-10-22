window.addEventListener("load", function(){

    let btnModif=document.getElementById('test');
    let btnEnvoiMod=document.getElementById('modifier');
    let btnAnnuler=document.getElementById('annuler');
    let divCacher=document.querySelector('#hidden');
    let btnEnvoiIns=document.getElementById('envoyer');
    console.log(btnEnvoiIns);
    
    
    //author fred
    // FORMULAIRE MODIFICATION DE MOT DE PASSE
    btnModif.addEventListener("click", function(){
        let divCacher=document.querySelector('.teste');
        divCacher.classList.remove("cacher");
    })
    
    btnEnvoiMod.addEventListener("click", function(event){
        let mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
        let form=document.getElementById("form");
        let newPW=document.getElementById("newPW").value;
        let confirmNewPW=document.getElementById("confirmNewPW").value;
        if(newPW==confirmNewPW)
        {
            if(newPW.match(mediumRegex))
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
    
    btnAnnuler.addEventListener("click", function(){
        let divCacher=document.querySelector('.teste');
        divCacher.classList.add("cacher");
    })
    
    
    

});