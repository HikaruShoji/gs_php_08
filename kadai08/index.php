<?php
//1.  DB接続します xxxにDB名を入れます
try {
$pdo = new PDO('mysql:dbname=b_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM b_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<main class="main_answer">';
    $view .= '<div class="list">' . '<p class="store_title">店名：</p>'. '<p class="store_value">'. $result["name"] . '</p>' . '</div>';
    $view .= '<div class="list">';
    $view .= '<div class="list">' . '<p class="industry_title">業種：</p>' . '<p class="industry_value">' . $result["industry"] . '</p>' . '</div>';
    $view .= '<div class="list">' . '<p class="pref_title">都道府県：</p>' . '<p class="pref_value">' . $result["pref"] . '</p>' . '</div>';
    $view .= '</div>';
    $view .= '<div class="list">' . '<p class="tel_title">電話番号：</p>' . '<p class="tel_value">' .$result["telNumber"] . '</p>' . '</div>';
    $view .= '<div>' . '<p class="naiyou_title">紹介文：</p>' . '<p class="naiyou_value">' .nl2br($result["naiyou"]) . '</p>' . '</div>';
    $view .= '</main>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>メインページ</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/select_style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <div class="navbar-brand title">店舗情報ページ</div>
      <a class="navbar-brand" href="login.php">ログイン</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<div>
    <div class="container jumbotron">
      <?=$view?>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>