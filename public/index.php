<?php
//Kode Api Key Bot
$botApi = "6093828826:AAGzDvezH2YmdvfRPLuAfcU9LiBzA5WC2iw";

define('BOT_TOKEN', $botApi);
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

// Mengambil data JSON dari bot Telegram
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Mengambil data user dan pesan
$userID = $update["message"]["from"]["id"];
$userName = $update["message"]["from"]["username"];
$message = $update["message"]["text"];

// Fungsi untuk membaca file data.txt dan mengembalikan pesan secara acak
function getRandomMessage() {
    $messages = file("data/chat.txt", FILE_IGNORE_NEW_LINES);
    return $messages[array_rand($messages)];
}

// Fungsi untuk mengirim pesan ke user
function sendMessage($chatID, $message) {
    $url = "https://api.telegram.org/'$botApi'/sendMessage?chat_id=".$chatID."&text=".urlencode($message);
    file_get_contents($url);
}

// Cek pesan yang diterima dari user dan memberikan balasan sesuai dengan pesan
switch ($message) {
    case "/start":
        sendMessage($userID, "Halo $userName, selamat datang di bot Telegram!");
        break;
    case "/help":
        sendMessage($userID, "Untuk menggunakan bot ini, kirimkan pesan ke saya dan saya akan membalasnya!");
        break;
    default:
        $reply = getRandomMessage();
        sendMessage($userID, $reply);
        break;
}
?>
