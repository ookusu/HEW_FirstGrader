<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<html>

<head>
  <title>企業登録</title>
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/kigyou_insertin.css">
  <link rel="shortcut icon" href="" />
</head>

<body>
  <header><img src="images/top_logo.png" alt="就活の翼"></header>

  <div id="wrap">
    <?php
//  表示部
?>
    <h1>企業登録</h1>
    <br /><br />
    <form method="post" action="kigyou_insertout.php">

      <input type="text" placeholder="企業名" name="name" size="41" maxlength="12" />

      <br /><br /><br />
      <input type="submit" value="登録" />
      <input type="reset" value="入力クリア" />
      <a href="kigyou.php"><input type="button" value="キャンセル"></input></a>
    </form>
  </div>
</body>

</html>