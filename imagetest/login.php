<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="css/todo.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="login">

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="login.php" id=login_title>LOGIN</a>
　　</div>
    </div>
    </nav>
    </header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="login_act.php" id="login">
  <!-- <div class="jumbotron"> -->
   <!-- <fieldset> -->
    <legend>ようこそ</legend>
    <br>
     <label>ID：<input type="text" name="lid" ></label><br>
     <br>

     <label>PW：<input type="text" name="lpw"></label><br>
     <br>
     <button type="submit" class="btn btn-primary">ログイン</button>
    <!-- </fieldset> -->
  <!-- </div> -->
</form>
<!-- Main[End] -->


</body>
</html>