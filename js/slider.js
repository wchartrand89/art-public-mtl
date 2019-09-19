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
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "flex";
        dots[slideIndex-1].className += " active";
        }

});





   