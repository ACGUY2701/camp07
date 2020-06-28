<?php
//DBへ接続
try {
    $pdo = new PDO('mysql:dbname=user_db;charset=utf8;host=localhost', 'root', 'root');
    
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$sql = 'SELECT * FROM memolist_table WHERE id = :id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['image_type']);
echo $image['image_content'];

unset($pdo);
exit();
?>