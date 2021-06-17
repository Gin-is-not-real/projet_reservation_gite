function getXMLHttpRequest() 
{
    if (window.XMLHttpRequest) {
        return new window.XMLHttpRequest;
    }
    else {
        try {
            return new ActiveXObject("MSXML2.XMLHTTP.3.0");
        }
        catch(ex) {
            return null;
        }
    }
}

function handler()
{
    if (oReq.readyState == 4 /* complete */) {
        if (oReq.status == 200) {
            alert(oReq.responseText);
        }
    }
}

var oReq = getXMLHttpRequest();

if (oReq != null) {
    oReq.open("GET", "http://localhost/view/homeView.php", true);
    oReq.onreadystatechange = handler;
    oReq.send();
}
else {
    window.alert("AJAX (XMLHTTP) not supported.");
}