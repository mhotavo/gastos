function __(id) {
    return document.getElementById(id);
}

function DeleteItem(contenido, url) {
    var action = window.confirm(contenido);
    if (action) {
        window.location = url;
    }
}

function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

function mostrarFecha(days) {
    milisegundos = parseInt(35 * 24 * 60 * 60 * 1000);
    fecha = new Date();
    day = fecha.getDate();
    // el mes es devuelto entre 0 y 11
    month = fecha.getMonth() + 1;
    year = fecha.getFullYear();
    //document.write("Fecha actual: "+day+"/"+month+"/"+year);
    //Obtenemos los milisegundos desde media noche del 1/1/1970
    tiempo = fecha.getTime();
    //Calculamos los milisegundos sobre la fecha que hay que sumar o restar...
    milisegundos = parseInt(days * 24 * 60 * 60 * 1000);
    //Modificamos la fecha actual
    total = fecha.setTime(tiempo + milisegundos);
    day = fecha.getDate();
    month = fecha.getMonth() + 1;
    year = fecha.getFullYear();
    return year + "-" + pad(month, 2) + "-" + pad(day, 2);
}
 

 

 

function validarPasswords() {
    var nueva = $("#nueva").val();
    var confir = $("#confirmar").val();
    var actual = $("#actual").val();
    $("#msjConfirmar").empty();
    if (actual == nueva) {
        $("#actual").val("");
        $("#nueva").val("");
        $("#confirmar").val("");
        $("#actual").focus();
        $("#msjConfirmar").append('<span style="color:orange;font-size:14px;font-weight:bold">La contraseña debe ser diferente a la anterior. <i class="fa fa-key" aria-hidden="true"></i></span>');
    } else {
        if ($("#nueva").val().length < 5) {
            $("#nueva").val("");
            $("#confirmar").val("");
            $("#nueva").focus();
            $("#msjConfirmar").append('<span style="color:orange;font-size:14px;font-weight:bold">Min. 5 caracteres <i class="fa fa-key" aria-hidden="true"></i></span>');
        } else {
            if (nueva != confir) {
                $("#nueva").val("");
                $("#confirmar").val("");
                $("#nueva").focus();
                $("#msjConfirmar").append('<span style="color:orange;font-size:14px;font-weight:bold">Las contraseñas no coinciden <i class="fa fa-key" aria-hidden="true"></i></span>');
            }
        }
    }
}

function validarPasswordActual() {
    $("#msjActual").empty();
    var actual = $("#actual").val();
    var id = $("#id").val();
    $.get('GoLogin/validarPassword', {
        actual: actual,
        id: id
    }, function(resp, estado, jqXHR) {
        if (resp != 1) {
            $("#actual").val("");
            $("#actual").focus();
            $("#msjActual").append('<span style="color:orange;font-size:14px;font-weight:bold">Contraseña incorrecta <i class="fa fa-key" aria-hidden="true"></i></span>');
        }
    });
}