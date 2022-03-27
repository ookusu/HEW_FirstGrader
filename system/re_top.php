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
    <link rel="stylesheet" href="./css/re_top.css">
    <link rel="shortcut icon" href="">
</head>

<body>
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

//session_start();
$strrand = $_POST['rand'];
$strrand_a = $_POST['rand_a'];
$strmas = $_POST['massage'];
//$_SESSION['dbName'] = $strrand;
//$strrand = $_SESSION['dbName'];
//var_dump($strrand);


?>

<header><img src="images/top_logo.png" alt="就活の翼"></header>

<div id="wrap">

    <div class="submit_top">

        <form method="post" action="top.php">
            <input type="hidden" value="<?php print $strrand ?>"
                name="rand"></input>
            <input type="hidden" value="<?php print $strmas ?>"
                name="massage"></input>
            <div class="toukou">
                <input type="submit" value="topへ" name="top_sub"></input>
            </div>
        </form>
        <form method="post" action="re_in.php">
            <input type="hidden" value="<?php print $strrand ?>"
                name="rand"></input>
            <input type="hidden" value="<?php print $strmas ?>"
                name="massage"></input>
            <input type="hidden" value="<?php print $strrand_a ?>"
                name="rand_a"></input>
            <div class="sa-ti">
                <input type="submit" value="返信する" name="re_sub"></input>
            </div>
        </form>

    </div>

<?php


//SQL文の作成
$strSQL = " select * from $strrand_a ";

//SQL文を実行する
$db_result = mysqli_query($db_link, $strSQL);

//取得したデータ件数を調べる
$db_cnt = mysqli_num_rows($db_result);
//var_dump($db_cnt);


if ($db_cnt == 0) {
    print "<br />"."<h1>"."$strmas"."</h1>";
    //データがない場合
    print "<font color = red>";
    print "返信がありません。";
    print "</font>";
} else {
    print "<br />"."<h1>"."$strmas"."</h1>";
    while ($db_row = mysqli_fetch_array($db_result)) {
        print "<div class=\"top\">";
        print "<p>".$db_row['massage_a']."</p>";
        print "</div>";
    }
    mysqli_free_result($db_result);
}




mysqli_close($db_link);


?>

</div>

</body>

</html>