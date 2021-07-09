<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>ログイン</title>
  <link rel="canonical" href="">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/login_style.css" rel="stylesheet">
</head>
<body class="text-center">
<!-- Head[Start] -->
<header>

</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<!-- login_act.phpにデータを送ります -->
<main class="form-signin">
  <form  action="login_act.php" method="post">
    <fieldset>
    <h1 class="h3 mb-3 fw-normal"><legend>ログインページ</legend></h1>
      <label for="inputID" class="visually-hidden">
        <input type="text" name="lid" id="inputID" class="form-control" placeholder="ID" required autofocus></label>
      <label for="inputPassword" class="visually-hidden">
        <input type="password" name="lpw" id="inputPassword" class="form-control" placeholder="Password" required></label>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me">記憶する</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">LOGIN</button>
      </fieldset>
  </form>
</main>
<!-- Main[End] -->
</body>
</html>