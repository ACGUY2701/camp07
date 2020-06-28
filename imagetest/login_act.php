<?php
//1. POSTデータ取得
session_start();
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=user_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3.SELECT
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE user_id=:lid AND user_pw=:lpw");
$stmt->bindValue(':lid', $lid );  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw );  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
    //1データのみの抽出の場合は、whileループは不要
    $val=$stmt->fetch();
}

//5.該当データがあれば、sessionに値を代入
//1データのidが空じゃない時、sessionに値を挿入
if( $val["id"] != "" ){
    $_SESSION["ch_session_id"] = session_id();
    $_SESSION["user_name"] = $val["user_name"];  //ユーザネームをセッション変数に渡す
    //login処理がＯＫならば、select.phpへ遷移
    header("Location: select.php");

}else{
    //login処理がＮＧの時、login.phpへ遷移（もとに戻る）idが空ならば
    header("Location: login.php");
}
 //処理終了
 exit;

?>