window.addEventListener("load", function(){
    
    let btnModif=document.getElementById('test');
    
    btnModif.addEventListener("click", function(){
        let divCacher=document.querySelector('.cacher');
        divCacher.classList.toggle("cacher");
    })

});