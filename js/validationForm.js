window.addEventListener("load", function(){
    
    let btnModif=document.getElementById('test');
    let btnEnvoi=document.getElementById('modifier');
    let btnAnnuler=document.getElementById('annuler');
    let divCacher=document.querySelector('#hidden');
    
    btnModif.addEventListener("click", function(){
        let divCacher=document.querySelector('.teste');
        divCacher.classList.remove("cacher");
    })
    
    btnEnvoi.addEventListener("click", function(){
        let mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
        let form=document.getElementById("form");
        let newPW=document.getElementById("newPW").value;
        let confirmNewPW=document.getElementById("confirmNewPW").value;
        if(newPW==confirmNewPW)
        {
            if(newPW.match(mediumRegex))
            {
              console.log("bravo");
              form.submit(); 
            }
            else
            {
                document.getElementById("msgErreurRegex").innerHTML="Votre mot de passe doit contenir au moins 8 caractères, une majusucule, une minuscule et un chiffre.";
            }
        }
        else
        {
            document.getElementById("msgErreurConfirm").innerHTML="Vous devez confirmer votre mot de passe.";
        }
    })
    
    btnAnnuler.addEventListener("click", function(){
        let divCacher=document.querySelector('.teste');
        divCacher.classList.add("cacher");
    })

});