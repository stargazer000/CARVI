<?php
//$search_key = filter_input( INPUT_GET, "code" );
$search_key = 7197000705;
try {
    $pdo = new PDO('mysql:host=localhost;dbname=carvi;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);    
    $sql = "SELECT * FROM outline WHERE code like '%{$search_key}%';";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];
    $sql2 = "SELECT filepath FROM media WHERE outline_id like '%{$id}%';";
    $stmt2 = $pdo->query($sql2);
    $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        echo "タイトル：".$result['title']."<br>本文:".$result['body']."<br>画像<br>";
        echo '<img src="'.$result2['filepath'].'"/>' ;
}catch(PDOException $Exception){
    die('接続エラー：' . $Exception->getMessage());
}
$pdo = null;
?>