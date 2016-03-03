
var xmlhttp;

function showMatches(str) {
	if (str.length==0) {
            document.getElementById("TxtHint").innerHTML="";
            return;
	}

	xmlhttp=GetXmlHttpObject(); //in the 'ajax.js' file

	if (xmlhttp==null)	{
        alert ("Your browser does not support XMLHTTP!");
		return;
	}

	var url="newEmpSearcher.php";
    url=url+"?q="+str;
    url=url+"&sid="+Math.random();
    xmlhttp.onreadystatechange=stateChanged;
    xmlhttp.open("GET",url,true);
    xmlhttp.send(null);
}

function stateChanged() {
	if (xmlhttp.readyState==4) { //readyState==4 means done
		document.getElementById("TxtHint").innerHTML=xmlhttp.responseText;
	}
}
$(document).ready(function(){
    $("button").click(function(){
        $("#div1").empty();
    });
});