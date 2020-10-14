define([],function () {

    
    return  {
        sortId: function () {
 
// function sortId() {

        var url = window.location.href;
        var hash = location.hash; 
        url = url.replace(hash, '');

        if (url.indexOf("?") >= 0) {

            var params = url.substring(url.indexOf("?") + 1).split("&");
            var paramFound = false;
            params.forEach(function(param, index) {

                var p = param.split("=");
                if (p[0] == "TableSort") {

                    if (p[1] == "Idasc") {
                        params[index] = "TableSort" + "=" + "Iddesc";
                    } else {
                        params[index] = "TableSort" + "=" + "Idasc";
                    }
                    paramFound = true;
                }
            });

            if (!paramFound) {
                params.push("TableSort" + "=" + "Idasc");
            }
            url = url.substring(0, url.indexOf("?") + 1) + params.join("&");
        } else {
            url += "?" + "TableSort" + "=" + "Idasc";
        }
        window.location.href = url + hash;
    },

    sortEmail: function (){
// function sortEmail() {

    var url = window.location.href;
    var hash = location.hash;
    url = url.replace(hash, '');

    if (url.indexOf("?") >= 0) {

        var params = url.substring(url.indexOf("?") + 1).split("&");
        var paramFound = false;
        params.forEach(function(param, index) {

            var p = param.split("=");
            if (p[0] == "TableSort") {

                if (p[1] == "Emailasc") {
                    params[index] = "TableSort" + "=" + "Emaildesc";
                } else {
                    params[index] = "TableSort" + "=" + "Emailasc";
                }
                paramFound = true;
            }
        });

        if (!paramFound) {
            params.push("TableSort" + "=" + "Emailasc");
        }
        url = url.substring(0, url.indexOf("?") + 1) + params.join("&");
    } else {
        url += "?" + "TableSort" + "=" + "Emailasc";
    }
    window.location.href = url + hash;
},

sortIn: function (){

    var url = window.location.href;
    var hash = location.hash;
    url = url.replace(hash, '');

    if (url.indexOf("?") >= 0) {

        var params = url.substring(url.indexOf("?") + 1).split("&");
        var paramFound = false;
        params.forEach(function(param, index) {

            var p = param.split("=");
            if (p[0] == "TableSort") {

                if (p[1] == "Inasc") {
                    params[index] = "TableSort" + "=" + "Indesc";
                } else {
                    params[index] = "TableSort" + "=" + "Inasc";
                }
                paramFound = true;
            }
        });

        if (!paramFound) {
            params.push("TableSort" + "=" + "Inasc");
        }
        url = url.substring(0, url.indexOf("?") + 1) + params.join("&");
    } else {
        url += "?" + "TableSort" + "=" + "Inasc";
    }
    window.location.href = url + hash;
},

sortOut: function(){

    var url = window.location.href;
    var hash = location.hash;
    url = url.replace(hash, '');

    if (url.indexOf("?") >= 0) {

        var params = url.substring(url.indexOf("?") + 1).split("&");
        var paramFound = false;
        params.forEach(function(param, index) {

            var p = param.split("=");
            if (p[0] == "TableSort") {

                if (p[1] == "Outasc") {
                    params[index] = "TableSort" + "=" + "Outdesc";
                } else {
                    params[index] = "TableSort" + "=" + "Outasc";
                }
                paramFound = true;
            }
        });

        if (!paramFound) {
            params.push("TableSort" + "=" + "Outasc");
        }
        url = url.substring(0, url.indexOf("?") + 1) + params.join("&");
    } else {
        url += "?" + "TableSort" + "=" + "Outasc";
    }
    window.location.href = url + hash;
}
    }

});