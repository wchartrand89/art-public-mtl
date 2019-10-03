function getXHR(){
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();//Firefox, Safari..,
    }
    else if(window.ActiveXObject){ //Version Active
        xhr=new ActiveXObject("Microsoft.XMLHTTP"); //Internet Explorer
    }
    return xhr;
}