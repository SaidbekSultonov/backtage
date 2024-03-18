<?php 

$token = '5819755131:AAE0M6BhOizngX3OVmtoakBFlXoVp4WpY3o';

$msg = 'server2';
$user_id = 284914591;
$arr = [
  'chat_id' => $user_id,
  'text' => $msg
];

$url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($arr);
file_get_contents($url);

