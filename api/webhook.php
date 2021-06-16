<?php
header('content-type: application/json');
require_once 'Bot.php';
$bot = new Bot();
// 获取/token 命令，获取聊天 id
$data = json_decode(file_get_contents("php://input"), true);
$message = $data['message']['text'] ?? '';
if ($message === '/token') {
    $chat_id = $data['message']['chat']['id'];

    $bot->sendMessage(['text' => '请求网址即可发送消息:
msg最好UrlEncode一下
https://bz-tgtip.vercel.app/send?token='.$bot->encryption($chat_id).'&message=测试消息', 'chat_id' => $chat_id]);
}
echo json_encode(['code' => 200, 'message' => 'success']);