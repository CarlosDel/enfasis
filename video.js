$(document).ready(function () {
   // alert("The audio has ended");
});



//Funcion dee prueba para evento Stop del video
function hola() {
    alert("Video detenido");

}

//Saber si el video si termino la reproduccion
function videoPrinc() {
    var videoPrincipal = document.getElementById("id_videoPrincipal");

    if (videoPrincipal.ended){
        //El video termino
        alert("video termino");

    }
    else{
        //El video NO termino
        alert("no termino");
    }
}

//Funcion cuando se regresa al Home / inicioUsuario.php
$(function () {
    $("#btn_Home_1").click(function (event) {
        //location.href="inicioUsuario.php";
        //alert("Boton 1");
        videoPrinc();

    });
});
$(function () {
    $("#btn_Home_2").click(function (event) {
        //location.href="inicioUsuario.php";
        //alert("Boton 2");
        videoPrinc();

    });
});
$(function () {
    $("#btn_Home_3").click(function (event) {
        //alert("Boton 3");
        videoPrinc();
    });
});
$(function () {
    $("#btn_Home_4").click(function (event) {
        //alert("Boton 4");
        videoPrinc();
    });
});


//Funcion para retardo/delay
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
            break;
        }
    }
}

//-----------Enviar Calificacion a la bd

$(function () {
    $("#btn_regCalificacion").click(function (event) {

        //idUserJS
        //idVideoJS
        //catVideoJS


        var califVideoJS_temp = $("#calif_videoPrincipal").prop("value");
        var califVideoJS = 0;
        if(califVideoJS_temp==""){
            califVideoJS = 0;
        }else{
            califVideoJS = califVideoJS_temp;

            var juser = '{"idUserJS":"' + idUserJS + '","idVideoJS":"' + idVideoJS + '","catVideoJS":"' + catVideoJS + '","califVideoJS":"' + califVideoJS + '"}';


            enviarCalificacion(juser);
        }
    });
});

function enviarCalificacion(juser) {
    $.ajax({
        url: 'video_addCalificacion.php',
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: juser,
        complete: function (response) {
            //alert(JSON.stringify(response));
        }
    });
}
