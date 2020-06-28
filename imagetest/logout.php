<?php

session_start();

//SESSIONを初期化する（SESSIION変数に入っている配列の値を空にする）
$_SESSION[]=array();

//COOKEIに保存してあるsessionidの保存期間を過去にして破棄
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time-42000,'/');
}

//サーバ側のsessionidを削除
session_destroy();

//処理後は、login.phpへ遷移
header("Location: login.php");
exit;

?>