<?php
// Import library PHP Telegram Bot
use TelegramBot\Api\Client;
use TelegramBot\Api\Types\Message;

// Inisialisasi bot dengan token Anda
$bot = new Client('5578179405:AAFYgUASbwVRuHo8myue-hBpoZh2vL09tk8');

// Set webhook URL
$bot->setWebhook(['url' => 'https://naesan-bot.vercel.app/hook.php']);

// Tangkap request dari Telegram
$updates = $bot->getWebhookUpdates();

// Kirim pesan balasan
$message = $updates->getMessage();
$bot->sendMessage($message->getChat()->getId(), 'Hello from Vercel!');

?>