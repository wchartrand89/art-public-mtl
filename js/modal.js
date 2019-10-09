                function handle(elem){
                    
                    //console.log(elem);
                    var test = elem.dataset.href;
                    var modal = document.getElementById("myModal");
                    var linkSupprimer = document.getElementById("linkSupprimer");
                
                    console.log(test);
                    
                    modal.style.display = "block";
                    linkSupprimer.setAttribute("href", test);
                    
                    
                }
                
                window.addEventListener("load", function(){
//                    
                    var modal = document.getElementById("myModal");
//                    var btn = document.getElementsByClassName(".modalPopup");
                    var span = document.getElementsByClassName("close")[0];
//                    
//                    console.log(btn);
//                    
//                    
//                    btn.addEventListener("click", function(){
//                        console.log(this);
//                    });
//
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                      modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                      if (event.target == modal) {
                        modal.style.display = "none";
                      }
                    }
//
//                    
                });