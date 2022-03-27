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
$strid = $_POST['cus_id'];
$strpass = $_POST['cus_pas'];
$strname = $_POST['cus_name'];

$strid = mysqli_real_escape_string($db_link, $strid);
$strpass = mysqli_real_escape_string($db_link, $strpass);
$strname = mysqli_real_escape_string($db_link, $strname);

//判定

if ($strid == null || $strpass == null) {
    $msg = "入力してください";
} else {
    $strSQL  = " select * from meibo_tbl where cus_id = '$strid'";

    $db_result = mysqli_query($db_link, $strSQL);

    $db_cnt = mysqli_num_rows($db_result);

    if ($db_cnt == 0) {

//SQL文の作成
        $strSQL = "insert into meibo_tbl(cus_id,cus_pas,cus_name) values('".$strid."','".$strpass."','".$strname."')";

        //SQL文を実行する
        $db_result = mysqli_query($db_link, $strSQL);

        if ($db_result = false) {
            //insertの失敗
            $msg = "顧客登録が失敗しました。".$strSQL;
        } else {
            //insertの成功
            $msg = "顧客登録が完了しました。";
        }
    } else {
        $msg = "入力したIDは既に存在します";
    }
}
mysqli_close($db_link);

?>
<html>

<head>
    <title>新規登録</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/sinki_insertout.css">
    <link rel="shortcut icon" href="" />
</head>

<body>
    <header><img src="images/top_logo.png" alt="就活の翼"></header>
    <div id="wrap">
        <br /><br />
        <h1>
            <?php
//  表示部
print $msg;
?>
        </h1>
        <br /><br />
        <a href="login.php"><input type="button" value="ログイン画面へ" /></a>
    </div>
</body>

</html>