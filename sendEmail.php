<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
/*var_dump($_POST);
var_dump(isset($_POST["asunto"]));
var_dump(isset($_POST["email"]));
var_dump(isset($_POST["servicio"]));
var_dump(isset($_POST["fecha"]));
var_dump(isset($_POST["motivo"]));
var_dump(isset($_POST["cantidad"]));
var_dump(isset($_POST["asunto"]) && isset($_POST["email"]) && isset($_POST["servicio"]) && isset($_POST["fecha"]) && isset($_POST["motivo"]) && isset($_POST["cantidad"]));
var_dump(isset($_POST["nombre"]));
var_dump(isset($_POST["mensaje"]));
var_dump(isset($_POST["asunto"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["mensaje"]));
die;*/
if ((isset($_POST["asunto"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["mensaje"])) ||
    (isset($_POST["asunto"]) && isset($_POST["email"]) && isset($_POST["servicio"]) && isset($_POST["fecha"]) && isset($_POST["motivo"]) && isset($_POST["cantidad"]))){
    $to = "hotel.zaraya@hotmail.com";
    //$to = "fray959@msn.com";
    $from = $_POST["email"];
    $subject = $_POST["asunto"]." - Hotel Zaraya";
    $nombre = false;

    $body = "<h1>Formulario de ".$subject."</h1><h3>Hotel Zaraya</h3>\n";
    if(isset($_POST["nombre"])){
        $body .= "<p><b>Nombre:</b> " . $_POST["nombre"] . "</p>\n";
        $nombre = $_POST["nombre"];
    }
    $body .= "<p><b>Email:</b> " . $_POST["email"] . "</p>\n";
    if(isset($_POST["servicio"])){
        $body .= "<p><b>Servicio:</b> " . $_POST["servicio"] . "</p>\n";
    }
    if(isset($_POST["fecha"])){
        $body .= "<p><b>Fecha:</b> " . $_POST["fecha"] . "</p>\n";
    }
    if(isset($_POST["motivo"])){
        $body .= "<p><b>Motivo:</b> " . $_POST["motivo"] . "</p>\n";
    }
    if(isset($_POST["cantidad"])){
        $body .= "<p><b>Cantidad:</b> " . $_POST["cantidad"] . " personas</p>\n";
    }
    if(isset($_POST["mensaje"])){
        $body .= "<p><b>Mensaje:</b> " . $_POST["mensaje"] . "</p>\n";
    }

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= 'From: '.($nombre?$nombre.'< '.$from." >":$from)."\r\n";

    /*echo $to;
    echo $subject;
    echo $body;
    echo $headers;*/

    try{
        if(mail($to, $subject, $body, $headers) && mail("fray959@msn.com", $subject, $body, $headers)){
            echo '<p class="message">Mensaje Enviado</p>';
        }else{
            echo '<p class="message">El Mensaje no pudo ser enviado, por favor intenta más tarde</p>';
        }
    }catch(Exception $e){
        echo '<p class="message">Parece que hubo un error, por favor intenta más tarde</p>';
    }
}else{
    echo '<p class="message">Por favor, revisa que los campos estén completos</p>';
}
?>
</body>
</html>