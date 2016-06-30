<?php
// リクエストからJOSNデータを受け取る
// JOSNデータ受け取る変数 $json_data
$json_string = file_get_contents('php://input');
$json_data = json_decode($json_string);

//var_dump($json_data);