

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
        <a class="navbar-brand" href="select.php">Horse Racing Library</a>
        
　　</div>
    </div>
  </nav>

  
</header>

<main>
    <div class="container mt-5">
        <div class="row">
    
            <div class="col-md-4 pt-4 pl-4">
                <form method="post"  action="insert.php" enctype="multipart/form-data">
                    <div class="form-group">

                        <div id=aa>
                        <input type="text" id="datepicker" placeholder="馬名" name="day"></label><br>
                        

                        
                        </div id=aa>
                    
                        <textarea name="memo" id="memo" placeholder="特徴、狙いたいレース等"></textarea></label><br>
                        <input type="text" id="youtube" placeholder="参考レース映像URL" name="youtube"></label><br>
                        <br>
                        <label>画像を選択</label>
                        <input type="file" name="image" required>
                    </div>
                    <br>
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

