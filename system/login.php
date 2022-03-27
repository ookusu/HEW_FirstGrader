<!DOCTYPE html>
<?php
//  HTTPヘッダーで文字コードを指定
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
?>
<html>

<head>
    <title>就活の翼</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="">
</head>

<body>

    <div id="wrap">

        <header><img src="images/top_logo.png" alt="就活の翼"></header>
        <form method="post" action="kigyou_hyouji.php">
            <input type="text" placeholder="ユーザーID" name="txtID"></input>
            <input type="password" placeholder="パスワード" name="txtPASS"></input>
            <input type="submit" name="subSend" method="POST" value="ログイン"></input>
            <input type="reset" value="リセット"></input>
            <a href="sinki_insertin.php"><input type="button" value="新規登録"></input></a>
        </form>
        <?php
//  表示部
?>

    </div>

</body>

</html>