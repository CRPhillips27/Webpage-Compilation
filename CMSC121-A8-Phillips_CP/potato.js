var WEB_APP = "potato.php";  

document.observe("dom:loaded", function() {
    var checkboxes = $$("#controls input");
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
        checkboxes[i].observe("change", toggleAccessory);
    }
    new Ajax.Request(WEB_APP, {
        method: "get",
        onSuccess: ajaxGotState,
        onFailure: ajaxFailure,
        onException: ajaxFailure
    });
});
function ajaxGotState(ajax) {
    $("status").innerHTML = "He is wearing: " + ajax.responseText;
    var accessories = getAccessoriesArray(getCookie("accessories"));
    for (var i = 0; i < accessories.length; i++) {
        if (accessories[i]) {
            $(accessories[i]).checked = true;
            $(accessories[i] + "_image").appear();
        }
    }
}
function toggleAccessory() {
    if (this.checked) {
        $(this.id + "_image").appear();
    } else {
        $(this.id + "_image").fade();
    }
    var accessoriesString = getAccessoriesString();
    setCookie("accessories", accessoriesString);
    $("status").innerHTML = "He is wearing: " + accessoriesString;
    new Ajax.Request(WEB_APP, {
        method: "post",
        onFailure: ajaxFailure,
        onException: ajaxFailure,
        parameters: { accessories: accessoriesString }
    });
}
function setCookie(name, value) {
    document.cookie = name + "=" + value;
}
function getCookie(name) {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1);
        }
    }
    return null;
}
function getAccessoriesString() {
    var accessories = [];
    var checkboxes = $$("#controls input");
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            accessories.push(checkboxes[i].id);
        }
    }
    return accessories.join(" ");
}
function getAccessoriesArray(accessoriesString) {
    return accessoriesString.strip().split(" ");
}
function setCookie(name, value) {
    document.cookie = name + "=" + encodeURIComponent(value) + "; path=/";
}

function getCookie(name) {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(name + "=") === 0) {
            return decodeURIComponent(cookie.substring(name.length + 1));
        }
    }
    return null;
}
function ajaxFailure(ajax, exception) {
    alert("Error making Ajax request:" + 
          "\n\nServer status:\n" + ajax.status + " " + ajax.statusText + 
          "\n\nServer response text:\n" + ajax.responseText);
    if (exception) {
        throw exception;
    }
}

