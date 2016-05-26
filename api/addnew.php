<?php
// 追加メインの処理

//リクエストからJOSNデータを受け取る　大野
//JOSNデータをセットする変数 $json_data　
include 'getjson.php';

//JOSNデータから画像データをファイルに保存して画像ファイルの保存パスを返す。　上田
//画像ファイルの保存パスをセットする変数 $file_path 
include 'savefile.php';


//コードを発行する　小南
//発行したコードをセットする変数 $code 
include 'generatecode.php';


//データベースに保存する 小森
include 'savedata.php';


//JOSNデータをレスポンスで返す