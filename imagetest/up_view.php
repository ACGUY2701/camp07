<?php

session_start();


$id=$_GET["id"];

 //DBへ接続
 try {
    $pdo = new PDO('mysql:dbname=user_db;charset=utf8;host=localhost', 'root', 'root');
    
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


$sql = 'SELECT * FROM memolist_table WHERE id=:id';
    //memolist_table テーブルから作成日時（indate）の新しい順でデータを取得しています。
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id',$id, PDO::PARAM_INT);
    $status=$stmt->execute();

    
    //4．データ表示
    $view="";
    if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
    }else{
    //1データのみの抽出の場合は、whileループは不要
    $row=$stmt->fetch();

    }
?>




<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>horse library</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/le-frog/jquery-ui.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="css/todo.css" rel="stylesheet">
</head>
<body >
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="select.php">馬ライブラリー</a>
        
　　</div>
    </div>
  </nav>

  
</header>

<main>
    <div class="container mt-5">
        <div class="row">
    
            <div class="col-md-4 pt-4 pl-4">
                <form method="post"  action="update.php" enctype="multipart/form-data">
                    <div class="form-group">

                        <div id=aa>
                        <input type="text" id="datepicker" placeholder="馬名" name="day" value="<?=$row["day"]?>"></label><br>
                        <textarea name="memo" id="memo" placeholder="特徴、狙いたいレース等" ><?=$row["memo"]?></textarea></label><br>
                        
                    </div>
                    <br>
                    <input type="hidden" name="id" value="<?=$row["id"]?>">
                    <button type="submit" class="btn btn-primary">保存</button>
                </form>

               

            </div>
        </div>
    </div>
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>