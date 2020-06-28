<?php
    session_start();

    //DBへ接続
    try {
        $pdo = new PDO('mysql:dbname=user_db;charset=utf8;host=localhost', 'root', 'root');
        
    } catch (PDOException $e) {
        exit('DbConnectError:'.$e->getMessage());
    }

  $sql = 'SELECT * FROM memolist_table ORDER BY indate DESC';
    //memolist_table テーブルから作成日時（indate）の新しい順でデータを取得しています。
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $memolist = $stmt->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>horse library</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="css/todo.css" rel="stylesheet">
</head>
<body>
    <header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="list.php">Horse Racing Library</a>
        <h5 id=usertitle>ようこそ、<?= $_SESSION["user_name"];?>さん</h5><br>
        <br>
        <a href="logout.php" id=logout>ログアウト</a>

　　</div>
    </div>
    </nav>
    </header>

<div class="col-md-8 border-center">
            <ul class="list-unstyled">
                <?php for ($i = 0; $i < count($memolist); $i ++): ?>
                    <li class="media mt-5" id=list>
                        <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                        <img src="image.php?id=<?= $memolist[$i]['id']; ?>" width="100px" height="auto" class="mr-3">
                        </a>
                        <div class="media-body">
                            <h5><?= $memolist[$i]['day']; ?> </h5>
                            <h5><?= $memolist[$i]['memo']; ?> </h5>
                            <?=$memolist[$i]['youtube']; ?>
                            <p><?= $memolist[$i]['indate']; ?> </p>
                            
                            <a href="javascript:void(0);" onclick="var ok = confirm('更新しますか？'); if (ok) location.href='up_view.php?id=<?= $memolist[$i]['id']; ?>'">
                            <i class="fas fa-book-open"></i> 更新</a>
                            <a>&nbsp</a>
                            <a href="javascript:void(0);" onclick="var ok = confirm('削除しますか？'); if (ok) location.href='delete.php?id=<?= $memolist[$i]['id']; ?>'">
                            <i class="far fa-trash-alt"></i> 削除</a>
                            
                        </div>
                    </li>
                <?php endfor; ?>
            </ul>
</div>

<div class="modal carousel slide" id="lightbox" tabindex="-1" role="dialog" data-ride="carousel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($memolist); $i++): ?>
                <li data-target="#lightbox" data-slide-to="<?= $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
            <?php endfor; ?>
        </ol>

        <div class="carousel-inner">
            <?php for ($i = 0; $i < count($memolist); $i++): ?>
                <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
                <img src="image.php?id=<?= $memolist[$i]['id']; ?>" class="d-block w-100">
                </div>
            <?php endfor; ?>
        </div>

        <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>

