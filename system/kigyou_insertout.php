<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<?php

include("db_ini.php");

$db_link = mysqli_connect($host, $user, $pass);

if ($db_link == false) {
    print "接続に失敗しました。";
    exit;
}

$db_flg = mysqli_select_db($db_link, $db_name);

if ($db_flg == false) {
    print "選択に失敗しました。";
    exit;
}

//charset指定
mysqli_set_charset($db_link, "utf8");

//ログイン画面から受け取り
$strname = $_POST['name'];

//$strname = mysqli_real_escape_string($db_link, $strname);

//判定
$strSQL  = " select * from kigyou_tbl where name = '$strname'";

$db_result = mysqli_query($db_link, $strSQL);

$db_cnt = mysqli_num_rows($db_result);

if ($db_cnt == 0) {
    //ランダムな文字列を生成する
    $strrand = chr(mt_rand(97, 122)) . chr(mt_rand(97, 122)) . chr(mt_rand(97, 122)) .
                chr(mt_rand(97, 122)) . chr(mt_rand(97, 122)) . chr(mt_rand(97, 122));
    //重複判定
    $strSQL  = " select * from kigyou_tbl where rand = '$strrand'";

    $db_result = mysqli_query($db_link, $strSQL);

    $db_cnt = mysqli_num_rows($db_result);

    if ($db_cnt == 0) {

        //SQL文の作成
        $strSQL = " insert into kigyou_tbl(name, rand) values('".$strname."','".$strrand."') ";

        //SQL文を実行する
        $db_result = mysqli_query($db_link, $strSQL);

        if ($db_result = false) {
            //insertの失敗
            $msg = "企業登録が失敗しました。".$strSQL;
        } else {
        
            //insertの成功
            $strSQL = " create table $strrand(id int primary key not null auto_increment,massage text,tag varchar(20) not null,rand_a varchar(100) not null); ";

            $db_result = mysqli_query($db_link, $strSQL);

            $msg = "企業登録が完了しました。";
        }
    } else {
        $msg = "既存の判定になりました。大変申し訳ないのですが、もう一度やり直してください。";
    }
} else {
    $msg = "入力した企業名は既に存在します";
}
mysqli_close($db_link);

?>
<html>

<head>
    <title>企業登録</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/kigyou_insertout.css">
    <link rel="shortcut icon" href="" />
</head>

<body>
    <header><img src="images/top_logo.png" alt="就活の翼"></header>
    <div id="wrap">
        <h1>企業登録</h1>
        <br /><br />
        <?php
//  表示部
print $msg;
?>
        <br /><br />
        <a href="kigyou.php"><input type="button" value="企業選択へ戻る" /></a>
    </div>
</body>

</html>