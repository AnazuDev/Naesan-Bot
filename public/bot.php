<?php
//Kode Api Key Bot
$botApi = "6093828826:AAGzDvezH2YmdvfRPLuAfcU9LiBzA5WC2iw";

$botToken = '6093828826:AAGzDvezH2YmdvfRPLuAfcU9LiBzA5WC2iw';

// get incoming message as JSON
$update = file_get_contents('php://input');

// decode JSON to array
$updateArray = json_decode($update, true);

// get chat ID from incoming message
$chatId = $updateArray['message']['chat']['id'];

// send message to chat ID
$message = 'Hello, your chat ID is ' . $chatId;
$payload = [
    'chat_id' => $chatId,
    'text' => $message,
];

$apiUrl = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-Type: application/json',
        'content' => json_encode($payload),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($apiUrl, false, $context);
$response = json_decode($result, true);

if ($response['ok'] == false) {
    // handle error
    echo $response['description'];
} else {
    // handle success
    echo 'Message sent successfully';
}

?>
