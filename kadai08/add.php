<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>簡易HP作成
  </title>
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
      <div class="navbar-brand">店舗登録ページ</div>
      <a class="navbar-brand" href="select.php">店舗情報へ移動</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div class="jumbotron">
  <fieldset>
    <legend>入力画面</legend>
    <dl>
    
    <label class="store_item">
    <dt>店舗名：</dt>
      <dd><input type="text" name="name" size="40" required></dd>
    </label><br/>

      <label class="industry_item">
      <dt>業種：</dt>
      <dd><select name="industry" required>
        <option value="">選択してください</option>
        <optgroup label="製造業">
          <option value="電機・電子・機械">電機・電子・機械</option>
          <option value="建築・設備・工事業">建築・設備・工事業</option>
          <option value="化学・製薬">化学・製薬</option>
          <option value="繊維・素材">繊維・素材</option>
          <option value="印刷・出版業">建印刷・出版業</option>
          <option value="農林水産業">農林水産業</option>
          <option value="食品">食品</option>
          <option value="その他の製造業">その他の製造業</option>
        </optgroup>
        <optgroup label="物流・通信業">
          <option value="IT・情報通信業">IT・情報通信業</option>
          <option value="電気・ガス・水道業">水道業</option>
          <option value="運輸･物流">運輸･物流</option>
          <option value="卸売・小売">卸売・小売</option>
          <option value="その他の物流・通信業">その他の物流・通信業</option>
        </optgroup>
        <optgroup label="金融・保険・不動産業">
          <option value="銀行・信託・金融業">銀行・信託・金融業</option>
          <option value="投資業">投資業</option>
          <option value="証券・商品取引">証券・商品取引</option>
          <option value="不動産取引業">不動産取引業</option>
          <option value="不動産賃貸業">不動産賃貸業</option>
          <option value="その他の金融・保険・不動産業">その他の金融・保険・不動産業</option>
        </optgroup>
        <optgroup label="サービス業">
          <option value="ホテル・旅館">ホテル・旅館</option>
          <option value="飲食">飲食</option>
          <option value="娯楽">娯楽</option>
          <option value="美容・理容業">美容・理容業</option>
          <option value="病院・医療・ヘルスケア">病院・医療・ヘルスケア</option>
          <option value="教育・研究・学会">教育・研究・学会</option>
          <option value="その他のサービス業">その他のサービス業</option>
        </optgroup>
        <optgroup label="各種団体">
          <option value="官公庁･政府機関･公益法人">官公庁･政府機関･公益法人</option>
          <option value="法人団体">法人団体</option>
          <option value="自治体">自治体</option>
          <option value="その他の団体">その他の団体</option>
        </optgroup>
        <option value="その他の業種">その他の業種</option>
      </select></dd>
    </label><br/>

    <label class="pref_item">
    <dt>都道府県：</dt>
      <dd><select name="pref" required>
        <option value="">選択してください</option>
        <option value="北海道">北海道</option>
        <option value="青森県">青森県</option>
        <option value="岩手県">岩手県</option>
        <option value="宮城県">宮城県</option>
        <option value="秋田県">秋田県</option>
        <option value="山形県">山形県</option>
        <option value="福島県">福島県</option>
        <option value="茨城県">茨城県</option>
        <option value="栃木県">栃木県</option>
        <option value="群馬県">群馬県</option>
        <option value="埼玉県">埼玉県</option>
        <option value="千葉県">千葉県</option>
        <option value="東京都" selected>東京都</option>
        <option value="神奈川県">神奈川県</option>
        <option value="新潟県">新潟県</option>
        <option value="富山県">富山県</option>
        <option value="石川県">石川県</option>
        <option value="福井県">福井県</option>
        <option value="山梨県">山梨県</option>
        <option value="長野県">長野県</option>
        <option value="岐阜県">岐阜県</option>
        <option value="静岡県">静岡県</option>
        <option value="愛知県">愛知県</option>
        <option value="三重県">三重県</option>
        <option value="滋賀県">滋賀県</option>
        <option value="京都府">京都府</option>
        <option value="大阪府">大阪府</option>
        <option value="兵庫県">兵庫県</option>
        <option value="奈良県">奈良県</option>
        <option value="和歌山県">和歌山県</option>
        <option value="鳥取県">鳥取県</option>
        <option value="島根県">島根県</option>
        <option value="岡山県">岡山県</option>
        <option value="広島県">広島県</option>
        <option value="山口県">山口県</option>
        <option value="徳島県">徳島県</option>
        <option value="香川県">香川県</option>
        <option value="愛媛県">愛媛県</option>
        <option value="高知県">高知県</option>
        <option value="福岡県">福岡県</option>
        <option value="佐賀県">佐賀県</option>
        <option value="長崎県">長崎県</option>
        <option value="熊本県">熊本県</option>
        <option value="大分県">大分県</option>
        <option value="宮崎県">宮崎県</option>
        <option value="鹿児島県">鹿児島県</option>
        <option value="沖縄県">沖縄県</option>
      </select></dd>
    </label><br/>
    
    <label class="tel_item">
      <dt>電話番号：</dt>
      <dd><input type="tel" name="telNumber" maxlength="17" minlength="10" autocomplete="on" required></dd></label><br/>
    
    <label class="naiyou_item">
      <dt>紹介文：</dt>
      <dd><textArea name="naiyou" rows="4" cols="40"></textArea></dd>
    </label><br/>
    <div class="btn">
      <input type="submit" value="送信">
      </fieldset>
    </div>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
