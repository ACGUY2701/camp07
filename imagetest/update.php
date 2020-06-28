<?php
            $id=$_POST["id"];
            
            $day = $_POST["day"];
            $memo = $_POST["memo"];
            // $youtube=$_POST["youtube"];


//DBへ接続
 try {
    $pdo = new PDO('mysql:dbname=user_db;charset=utf8;host=localhost', 'root', 'root');
    
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


//UPDATE
$stmt = $pdo->prepare("UPDATE memolist_table SET day=:day, memo=:memo WHERE id=:id");
// $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':day', $day, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':youtube', $youtube, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  }else{

    header("Location: select.php");
    exit;
  
  }

?>