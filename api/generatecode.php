<?php
$shard_id = 7777;
$insert_id = 1;
$seq = $insert_id % 1024;
$offset = time();
$instagram_millisec =(int) ((microtime(TRUE) - $offset) * 1000);

$code =$instagram_millisec * 8388608 + $shard_id * 1024 + $seq;
