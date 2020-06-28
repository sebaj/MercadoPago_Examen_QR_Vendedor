<?php

header('Content-type: application/json');
include_once '../../global/functions.php';
global $access_token,$collector_id,$notificationJSON;

// Este servicio llama a la URL recibida en la notificación
// Para ver el estado del pago.

$lastResource = trim(file_get_contents('../notifications.txt'));

if( !$lastResource ) {
	echo "{}";
	return true;
}

// REVISAR AQUÍ:
// Agrega la $url necesaria para revisar el estado del pago en base al recurso recibido de la notificación

// Sustituye el método por su correspondiente: get, put, post, delete

$jsonArray = json_decode($lastResource, true);
$topic = isset($jsonArray["topic"]) ? $jsonArray["topic"] : "";
$resource = isset($jsonArray["resource"]) ? $jsonArray["resource"] : "";
$url= "";

if( $topic == "payment") {
	$url="https://api.mercadopago.com/v1/payments";
	$call = json_decode( curl_call("get","$url/$resource?access_token=$access_token","", true), true );
	$resource = $call["order"]["id"];
}

$url="https://api.mercadopago.com/merchant_orders";
curl_call("get","$url/$resource?access_token=$access_token","");

?>
