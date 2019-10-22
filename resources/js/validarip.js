
function ValidateIPaddress(inputText) {
     var ipformat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
         if(inputText.value.match(ipformat)) {
             document.form.ip_local.focus();
             return true;
         } else {
             alert("No es una direccion de Ip valida!");
             document.form.ip_local.focus();
             return false;
     }
 }
