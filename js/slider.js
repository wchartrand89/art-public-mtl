window.addEventListener("load", function(){
    var slideIndex = 1;
    showSlides(slideIndex);

    let fleches=document.querySelectorAll(".fleches");
    fleches.forEach(function(fleche) {
        fleche.addEventListener("click", function(){
            if(fleche.classList.contains("prev")){
                plusSlides(-1);
            }
            else if(fleche.classList.contains("next")){
                plusSlides(1);
            }
                 
        })
    });

    let points=document.querySelectorAll(".point");
    points.forEach(function(point) {
        point.addEventListener("click", function(){
           console.log(point.dataset.slide);
           currentSlide(point.dataset.slide);
                 
        })
    });
    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("slide");
        var dots = document.getElementsByClassName("point");
        
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        if(dots.length>0){
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
                console.log(slideIndex-1);
            }
            dots[slideIndex-1].className += " active";
        }
        
        slides[slideIndex-1].style.display = "flex";
        
        }


        function adaptatif(x) {
            var slides = document.getElementsByClassName("slide");
            if (x.matches) { // If media query matches
                showSlides(1);
                for(i=0; i<fleches.length; i++){
                    fleches[i].classList.remove("hidden");
                }
            } else {
                /*enlever les fleches*/
                
                for(i=0; i<fleches.length; i++){
                    fleches[i].classList.add("hidden");
                }
                /*display flex sur toutes les slides*/ 
                for(i=0; i<slides.length; i++){
                    slides[i].style.display= "flex";
                }
               
            }
          }
          
          var x = window.matchMedia("(max-width: 900px)")
          adaptatif(x) // Call listener function at run time
          x.addListener(adaptatif) // Attach listener function on state changes

});





   