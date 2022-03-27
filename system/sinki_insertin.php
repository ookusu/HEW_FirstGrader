<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<html>

<head>
  <title>新規登録</title>
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/sinki_insertin.css">
  <link rel="shortcut icon" href="" />
</head>

<body>
  <div id="wrap">
    <?php
//  表示部
?>

    <header><img src="images/top_logo.png" alt="就活の翼"></header>

    <h1>新規登録</h1>
    <br /><br />
    <form method="post" action="sinki_insertout.php">

      <input type="text" placeholder="ユーザーID" name="cus_id" size="41" maxlength="20" /><br /><br />

      <input type="password" placeholder="パスワード" name="cus_pas" size="41" maxlength="20" />

      <input type="hidden" value="hogehoge" name="cus_name" />
      <br /><br /><br />
      <input type="submit" value="登録" />
      <input type="reset" value="入力クリア" />
      <a href="login.php"><input type="button" value="キャンセル"></input></a>
    </form>
  </div>
</body>

</html>