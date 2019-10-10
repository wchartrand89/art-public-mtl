
window.addEventListener("load", function(){
    let input = document.getElementById("bar_recherche");
    input.addEventListener("keyup", function(){
        let filter, ul, li, a, i, txtValue;
        console.log(document.querySelectorAll('#liste_oeuvres .info_oeuvre').length);
          filter = input.value.toUpperCase();
//          ul = document.getElementById("myUL");
          div = document.querySelectorAll('#liste_oeuvres .info_oeuvre')
//
//          // loop dans la liste et cache les oeuvres / artistes qui ne passent pas le filtre
          for (i = 0; i < div.length; i++) {
            a = div[i].getElementsByClassName("filtrer")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              div[i].style.display = "";
            } else {
              div[i].style.display = "none";
            }
          }
    })
    
})
