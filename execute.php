<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);

header("Content-Type: application/json");

$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao $firstname";
}
elseif($text=="come va?")
{
	$response = "Non c'è male";
}
elseif($text=="come stai?")
{
	$response = "Bene dai";
}
elseif($text=="domanda1")
{
	$response = "risposta1";
}
elseif($text=="domanda2")
{
	$response = "risposta2";
}
elseif($text=="domanda3")
{
	$response = "risposta3";
}
elseif($text=="domanda4")
{
	$response = "risposta4";
}
elseif($text=="domanda5")
{
	$response = "risposta5";
}
elseif($text=="domanda6")
{
	$response = "risposta6";
}
elseif($text=="domanda7")
{
	$response = "risposta7";
}
elseif($text=="domanda8")
{
	$response = "risposta8";
}
else
{
	$response = "Urca";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
