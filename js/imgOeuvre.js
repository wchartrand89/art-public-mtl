window.addEventListener("load", function(){
    let imgOeuvre=document.querySelectorAll(".img");
        for(i=0; i<imgOeuvre.length; i++){
            if(imgOeuvre[i].dataset.img!== ""){
                imgOeuvre[i].style.backgroundImage = "url('../../img/oeuvres/"+imgOeuvre[i].dataset.img+".jpg')";
            }else{
                imgOeuvre[i].classList.add("hidden");
            }
        }
        
   
});