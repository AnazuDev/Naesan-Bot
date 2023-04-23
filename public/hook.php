<?php

define('BOT_TOKEN', '6093828826:AAGzDvezH2YmdvfRPLuAfcU9LiBzA5WC2iw');

$bot_url = 'https://api.telegram.org/bot' . BOT_TOKEN . '/';
$webhook_url = 'https://naesan-bot.vercel.app/public/hook.php';

$url = $bot_url . 'setWebhook?url=' . $webhook_url;

$response = file_get_contents($url);

echo $response;


?>