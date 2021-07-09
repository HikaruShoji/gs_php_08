<?php

// 1.
$id = $_GET['id'];

//2. DB接続します xxxにDB名を入力する
try {
  $pdo = new PDO('mysql:dbname=b_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$sql = "SELECT * FROM b_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //idは数値なのでINT
$status = $stmt->execute();


//４．データ登録処理後
$view=""; //受け取るための変数を事前に作ります。
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //１データのみ抽出の場合はwhileループで取り出さない(一個しかデータが返ってこないので一レコード取得する)
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>簡易HP&nbsp;店舗情報変更</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/index_style.css" rel="stylesheet">

  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <div class="navbar-brand fs-1">店舗情報更新ページ</div>
      <a class="navbar-brand" href="select.php">店舗情報へ移動</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="update.php">
  <div class="jumbotron">
  <fieldset>
    <legend>入力画面</legend>
    <dl>
    <label class="store_item">
    <dt>店舗名：</dt>
      <dd><input type="text" name="name" size="40" required value="<?=$row["name"]?>"></dd>
    </label><br/>

      <label class="industry_item">
      <dt>業種：</dt>
      <dd><select name="industry" value="<?=$row["industry"]?>" required>
        <option value="">選択してください</option>
        <optgroup label="製造業">
          <option value="電機・電子・機械" <?php if ( $row['industry'] === '電機・電子・機械' ) { echo 'selected'; } ?> >電機・電子・機械</option>
          <option value="建築・設備・工事業" <?php if ( $row['industry'] === '建築・設備・工事業' ) { echo 'selected'; } ?>>建築・設備・工事業</option>
          <option value="化学・製薬" <?php if ( $row['industry'] === '化学・製薬' ) { echo 'selected'; } ?>>化学・製薬</option>
          <option value="繊維・素材" <?php if ( $row['industry'] === '繊維・素材' ) { echo 'selected'; } ?>>繊維・素材</option>
          <option value="印刷・出版業" <?php if ( $row['industry'] === '印刷・出版業' ) { echo 'selected'; } ?>>建印刷・出版業</option>
          <option value="農林水産業" <?php if ( $row['industry'] === '農林水産業' ) { echo 'selected'; } ?>>農林水産業</option>
          <option value="食品" <?php if ( $row['industry'] === '食品' ) { echo 'selected'; } ?>>食品</option>
          <option value="その他の製造業"<?php if ( $row['industry'] === 'その他の製造業' ) { echo 'selected'; } ?> >その他の製造業</option>
        </optgroup>
        <optgroup label="物流・通信業">
          <option value="IT・情報通信業" <?php if ( $row['industry'] === 'IT・情報通信業' ) { echo 'selected'; } ?> >IT・情報通信業</option>
          <option value="電気・ガス・水道業" <?php if ( $row['industry'] === '電気・ガス・水道業' ) { echo 'selected'; } ?> >電気・ガス・水道業</option>
          <option value="運輸･物流" <?php if ( $row['industry'] === '運輸･物流' ) { echo 'selected'; } ?> >運輸･物流</option>
          <option value="卸売・小売" <?php if ( $row['industry'] === '卸売・小売' ) { echo 'selected'; } ?> >卸売・小売</option>
          <option value="その他の物流・通信業" <?php if ( $row['industry'] === 'その他の物流・通信業' ) { echo 'selected'; } ?> >その他の物流・通信業</option>
        </optgroup>
        <optgroup label="金融・保険・不動産業">
          <option value="銀行・信託・金融業" <?php if ( $row['industry'] === '銀行・信託・金融業' ) { echo 'selected'; } ?> >銀行・信託・金融業</option>
          <option value="投資業" <?php if ( $row['industry'] === '投資業' ) { echo 'selected'; } ?> >投資業</option>
          <option value="証券・商品取引" <?php if ( $row['industry'] === '証券・商品取引' ) { echo 'selected'; } ?> >証券・商品取引</option>
          <option value="不動産取引業" <?php if ( $row['industry'] === '不動産取引業' ) { echo 'selected'; } ?> >不動産取引業</option>
          <option value="不動産賃貸業" <?php if ( $row['industry'] === '不動産賃貸業' ) { echo 'selected'; } ?> >不動産賃貸業</option>
          <option value="その他の金融・保険・不動産業" <?php if ( $row['industry'] === 'その他の金融・保険・不動産業' ) { echo 'selected'; } ?> >その他の金融・保険・不動産業</option>
        </optgroup>
        <optgroup label="サービス業">
          <option value="ホテル・旅館" <?php if ( $row['industry'] === 'ホテル・旅館' ) { echo 'selected'; } ?> >ホテル・旅館</option>
          <option value="飲食" <?php if ( $row['industry'] === '飲食' ) { echo 'selected'; } ?> >飲食</option>
          <option value="娯楽" <?php if ( $row['industry'] === '娯楽' ) { echo 'selected'; } ?> >娯楽</option>
          <option value="美容・理容業" <?php if ( $row['industry'] === '美容・理容業' ) { echo 'selected'; } ?> >美容・理容業</option>
          <option value="病院・医療・ヘルスケア" <?php if ( $row['industry'] === '病院・医療・ヘルスケア' ) { echo 'selected'; } ?> >病院・医療・ヘルスケア</option>
          <option value="教育・研究・学会" <?php if ( $row['industry'] === '教育・研究・学会' ) { echo 'selected'; } ?> >教育・研究・学会</option>
          <option value="その他のサービス業" <?php if ( $row['industry'] === 'その他のサービス業' ) { echo 'selected'; } ?> >その他のサービス業</option>
        </optgroup>
        <optgroup label="各種団体">
          <option value="官公庁･政府機関･公益法人" <?php if ( $row['industry'] === '官公庁･政府機関･公益法人' ) { echo 'selected'; } ?> >官公庁･政府機関･公益法人</option>
          <option value="法人団体" <?php if ( $row['industry'] === '法人団体' ) { echo 'selected'; } ?> >法人団体</option>
          <option value="自治体" <?php if ( $row['industry'] === '自治体' ) { echo 'selected'; } ?> >自治体</option>
          <option value="その他の団体" <?php if ( $row['industry'] === 'その他の団体' ) { echo 'selected'; } ?> >その他の団体</option>
        </optgroup>
        <option value="その他の業種" <?php if ( $row['industry'] === 'その他の業種' ) { echo 'selected'; } ?> >その他の業種</option>
      </select></dd>
    </label><br/>

    <label class="pref_item">
    <dt>都道府県：</dt>
      <dd><select name="pref" value="<?=$row["pref"]?>" required>
        <option value="">選択してください</option>
        <option value="北海道" <?php if ( $row['pref'] === '北海道' ) { echo 'selected'; } ?> >北海道</option>
        <option value="青森県" <?php if ( $row['pref'] === '青森県' ) { echo 'selected'; } ?> >青森県</option>
        <option value="岩手県" <?php if ( $row['pref'] === '岩手県' ) { echo 'selected'; } ?> >岩手県</option>
        <option value="宮城県" <?php if ( $row['pref'] === '宮城県' ) { echo 'selected'; } ?> >宮城県</option>
        <option value="秋田県" <?php if ( $row['pref'] === '秋田県' ) { echo 'selected'; } ?> >秋田県</option>
        <option value="山形県" <?php if ( $row['pref'] === '山形県' ) { echo 'selected'; } ?> >山形県</option>
        <option value="福島県" <?php if ( $row['pref'] === '福島県' ) { echo 'selected'; } ?> >福島県</option>
        <option value="茨城県" <?php if ( $row['pref'] === '茨城県' ) { echo 'selected'; } ?> >茨城県</option>
        <option value="栃木県" <?php if ( $row['pref'] === '栃木県' ) { echo 'selected'; } ?> >栃木県</option>
        <option value="群馬県" <?php if ( $row['pref'] === '群馬県' ) { echo 'selected'; } ?> >群馬県</option>
        <option value="埼玉県" <?php if ( $row['pref'] === '埼玉県' ) { echo 'selected'; } ?> >埼玉県</option>
        <option value="千葉県" <?php if ( $row['pref'] === '千葉県' ) { echo 'selected'; } ?> >千葉県</option>
        <option value="東京都" selected <?php if ( $row['pref'] === '東京都' ) { echo 'selected'; } ?> >東京都</option>
        <option value="神奈川県" <?php if ( $row['pref'] === '神奈川県' ) { echo 'selected'; } ?> >神奈川県</option>
        <option value="新潟県" <?php if ( $row['pref'] === '新潟県' ) { echo 'selected'; } ?> >新潟県</option>
        <option value="富山県" <?php if ( $row['pref'] === '富山県' ) { echo 'selected'; } ?> >富山県</option>
        <option value="石川県" <?php if ( $row['pref'] === '石川県' ) { echo 'selected'; } ?> >石川県</option>
        <option value="福井県"<?php if ( $row['pref'] === '福井県' ) { echo 'selected'; } ?> >福井県</option>
        <option value="山梨県"<?php if ( $row['pref'] === '山梨県' ) { echo 'selected'; } ?> >山梨県</option>
        <option value="長野県"<?php if ( $row['pref'] === '長野県' ) { echo 'selected'; } ?> >長野県</option>
        <option value="岐阜県"<?php if ( $row['pref'] === '岐阜県' ) { echo 'selected'; } ?> >岐阜県</option>
        <option value="静岡県"<?php if ( $row['pref'] === '静岡県' ) { echo 'selected'; } ?> >静岡県</option>
        <option value="愛知県"<?php if ( $row['pref'] === '愛知県' ) { echo 'selected'; } ?> >愛知県</option>
        <option value="三重県"<?php if ( $row['pref'] === '三重県' ) { echo 'selected'; } ?> >三重県</option>
        <option value="滋賀県"<?php if ( $row['pref'] === '滋賀県' ) { echo 'selected'; } ?> >滋賀県</option>
        <option value="京都府"<?php if ( $row['pref'] === '京都府' ) { echo 'selected'; } ?> >京都府</option>
        <option value="大阪府"<?php if ( $row['pref'] === '大阪府' ) { echo 'selected'; } ?> >大阪府</option>
        <option value="兵庫県"<?php if ( $row['pref'] === '兵庫県' ) { echo 'selected'; } ?> >兵庫県</option>
        <option value="奈良県"<?php if ( $row['pref'] === '奈良県' ) { echo 'selected'; } ?> >奈良県</option>
        <option value="和歌山県"<?php if ( $row['pref'] === '和歌山県' ) { echo 'selected'; } ?> >和歌山県</option>
        <option value="鳥取県"<?php if ( $row['pref'] === '鳥取県' ) { echo 'selected'; } ?> >鳥取県</option>
        <option value="島根県"<?php if ( $row['pref'] === '島根県' ) { echo 'selected'; } ?> >島根県</option>
        <option value="岡山県"<?php if ( $row['pref'] === '岡山県' ) { echo 'selected'; } ?> >岡山県</option>
        <option value="広島県"<?php if ( $row['pref'] === '広島県' ) { echo 'selected'; } ?> >広島県</option>
        <option value="山口県"<?php if ( $row['pref'] === '山口県' ) { echo 'selected'; } ?> >山口県</option>
        <option value="徳島県"<?php if ( $row['pref'] === '徳島県' ) { echo 'selected'; } ?> >徳島県</option>
        <option value="香川県"<?php if ( $row['pref'] === '香川県' ) { echo 'selected'; } ?> >香川県</option>
        <option value="愛媛県"<?php if ( $row['pref'] === '愛媛県' ) { echo 'selected'; } ?> >愛媛県</option>
        <option value="高知県"<?php if ( $row['pref'] === '高知県' ) { echo 'selected'; } ?> >高知県</option>
        <option value="福岡県"<?php if ( $row['pref'] === '福岡県' ) { echo 'selected'; } ?> >福岡県</option>
        <option value="佐賀県"<?php if ( $row['pref'] === '佐賀県' ) { echo 'selected'; } ?> >佐賀県</option>
        <option value="長崎県"<?php if ( $row['pref'] === '長崎県' ) { echo 'selected'; } ?> >長崎県</option>
        <option value="熊本県"<?php if ( $row['pref'] === '熊本県' ) { echo 'selected'; } ?> >熊本県</option>
        <option value="大分県"<?php if ( $row['pref'] === '大分県' ) { echo 'selected'; } ?> >大分県</option>
        <option value="宮崎県"<?php if ( $row['pref'] === '宮崎県' ) { echo 'selected'; } ?> >宮崎県</option>
        <option value="鹿児島県"<?php if ( $row['pref'] === '鹿児島県' ) { echo 'selected'; } ?> >鹿児島県</option>
        <option value="沖縄県"<?php if ( $row['pref'] === '沖縄県' ) { echo 'selected'; } ?> >沖縄県</option>
      </select></dd>
    </label><br/>
    
    <label class="tel_item">
      <dt>電話番号：</dt>
      <dd><input type="tel" name="telNumber" maxlength="17" minlength="10" autocomplete="on" value="<?=$row["telNumber"]?>" required></dd></label><br/>
    
    <label class="naiyou_item">
      <dt>紹介文：</dt>
      <dd><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></dd>
    </label><br/>
    </dl>
    <input type='hidden' name="id" value="<?=$row["id"]?>">
    <div class="btn">
      <input type="submit" value="更新">
    </div>

    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
