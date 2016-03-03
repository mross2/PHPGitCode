
function GetXmlHttpObject() {

    // code for IE7+, Firefox, Chrome, Opera, Safari
    if (window.XMLHttpRequest) {
         return new XMLHttpRequest();
    }

    // code for IE6, IE5
    if (window.ActiveXObject) {
         return new ActiveXObject("Microsoft.XMLHTTP");
    }

    return null;
}


