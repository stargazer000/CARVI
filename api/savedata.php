<?php
//データベースに保存する
$id = $_GET['id'];
$context = $_GET['context'];
$datetime = $_GET['datetime'];
$minetype = $_GET['minetype'];
$attreibutes = $_GET['attreibutes'];
$outkine_id = $_GET['outkine_id'];

try{
	$pdo = new PDO('mysql:host=localhost;dbname=carvi;charset=utf8','dummy_user','dummy_pass');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
}catch(PDOException $Exception){
    die('接続エラー：'.$Exception->getMessage());
}
		
try{
	$pdo->beginTransaction();
	$sql = <<<EOS
INSERT INTO media (id,content,datetime,minetype,attrebutes,outkine_id)
VALUES (:id,:content,:datetime,:minetype,:attrebutes,:outkine_id)
EOS;
	$stmh = $pdo -> prepare($sql);
	$stmh->bindValue(':id',$_POST['id']);
        $stmh->bindValue(':content',$_POST['content']);
        $stmh->bindValue(':datetime',$_POST['datetime']);
        $stmh->bindValue(':minetype',$_POST['minetype']);
        $stmh->bindValue(':attreibutes',$_POST['attreibutes']);
        $stmh->bindValue(':outkine_id',$_POST['outkine_id']);
	$stmh->execute();
	$pdo->commit();
	
$pdo=null;
}catch(PDOException $Exception){
	$pdo->rollBack();
	print "error:".$Exception -> getMessage();	
}
//JOSNデータをセットする変数 $json_data
$json_data = null;

//画像ファイルの保存パスをセットする変数 $file_path
$file_path = "";

//発行したコードをセットする変数 $code
$code = "";
?>
//JOSNデータをセットする変数 $json_data
$json_data = null;

//画像ファイルの保存パスをセットする変数 $file_path
$file_path = "";

//発行したコードをセットする変数 $code
$code = "";