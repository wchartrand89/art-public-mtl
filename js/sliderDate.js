window.addEventListener("load", function()
{
    var slider1 = document.querySelector(".v1");
    var slider2 = document.querySelector(".v2");

    var output = document.querySelector(".demo");
    var output2 = document.querySelector(".demo2");
    output.innerHTML = slider1.value; // Display the default slider value
    output2.innerHTML = slider2.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider1.oninput = function() {
    output.innerHTML = this.value;
    }
    slider2.oninput = function() {
    output2.innerHTML = this.value;
    }
});