<?php

//DBへ接続
try {
    $pdo = new PDO('mysql:dbname=user_db;charset=utf8;host=localhost', 'root', 'root');
    
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }

// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
//     // 画像を取得


// } else {
//     // 画像を保存
    
    // if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];
        $day = $_POST["day"];
        $memo = $_POST["memo"];
        $youtube=$_POST["youtube"];

        $sql = 'INSERT INTO memolist_table(id, image_name, image_type, image_content, image_size, day, memo, youtube, indate)
                VALUES (NULL, :image_name, :image_type, :image_content, :image_size, :day, :memo, :youtube, sysdate())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        $stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
        $stmt->bindValue(':youtube', $youtube, PDO::PARAM_STR);
        $status=$stmt->execute();
    // }
  
        //４．データ登録処理後
    if($status==false){
      //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
      $error = $stmt->errorInfo();
      exit("QueryError:".$error[2]);
    }else{
      //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
      header("Location: select.php");
      exit;
    }
// }

?>