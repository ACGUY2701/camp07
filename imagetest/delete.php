<?php

//DBへ接続
try {
    $pdo = new PDO('mysql:dbname=user_db;charset=utf8;host=localhost', 'root', 'root');
    
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


$sql = 'DELETE FROM memolist_table WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location: select.php');
exit();
?>