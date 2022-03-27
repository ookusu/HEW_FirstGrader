<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
?>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/kigyou.css">
    <link rel="shortcut icon" href="">
</head>

<body>

    <header><img src="images/top_logo.png" alt="就活の翼"></header>

    <div id="wrap">
        <h1>企業選択</h1>

        <a href="login.php"><input type="button" value="ログアウト"></input></a>
        <a href="kigyou_insertin.php"><input type="button" value="企業を追加する"></input></a>

        <?php
//  表示部

include("db_ini.php");

//MySqlサーバ接続
$db_link = mysqli_connect($host, $user, $pass);

if ($db_link == false) {
    print "MySqlサーバー接続に失敗しました。";
    exit;
}

//charset指定
mysqli_set_charset($db_link, "utf8");

//データベース接続
$db_flg = mysqli_select_db($db_link, $db_name);

if ($db_flg == false) {
    print "データベース接続に失敗しました。";
    exit;
}

//SQL文の作成
$strSQL = " select * from kigyou_tbl ";

//SQL文を実行する
$db_result = mysqli_query($db_link, $strSQL);

//取得したデータ件数を調べる
$db_cnt = mysqli_num_rows($db_result);


if ($db_cnt == 0) {
    //データがない場合
    print "<font color = red>";
    print "登録企業は存在しません。";
    print "</font>";
} else {
    while ($db_row = mysqli_fetch_array($db_result)) {
        print "<form action = \"top.php\" method = \"post\">";
        print "<input type = \"hidden\" value = \"".$db_row["rand"]."\" name = \"rand\">";
        print "</input>";
        print "<div class=\"kigyou\">";
        print $db_row["name"];
        print "<input type = \"submit\" value=\"選択\" name = \"subDel\">";
        print "</div>";
        print "</input>";
        print "</form>";
    }
    mysqli_free_result($db_result);
}

mysqli_close($db_link);


?>

    </div>
</body>

</html>