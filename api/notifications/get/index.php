<?php

header('Content-type: application/json');

include_once '../../global/functions.php';
global $access_token,$collector_id,$notificationJSON;


// Este servicio llama a la URL recibida en la notificación
// Para ver el estado del pago.

$lastResource = file_get_contents('../notifications.txt');

var_dump($lastResource);
echo "<br";
die("test");

$url="https://api.mercadopago.com/merchant_orders";
//https://api.mercadopago.com/merchant_orders?external_reference=ref28032356008&access_token=APP_USR-7026946692817220-061822-8b7c9e20631faac22d9e4cfa92a37265-586728271

// REVISAR AQUÍ:
// Agrega la $url necesaria para revisar el estado del pago en base al recurso recibido de la notificación

// Sustituye el método por su correspondiente: get, put, post, delete

curl_call("get","$url","");

 ?>
