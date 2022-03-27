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
    <title></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
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

//ログイン画面から受け取り
$strid = $_POST["txtID"];
$strpass = $_POST["txtPASS"];

//SQL文の作成
$strid = mysqli_real_escape_string($db_link, $strid);
$strpass = mysqli_real_escape_string($db_link, $strpass);
$strSQL_id  = " select * from meibo_tbl
            where cus_id = '$strid'";
           
$strSQL_pass =  " select * from meibo_tbl
            where cus_pas = '$strpass' and cus_id = '$strid'";

//SQL文を実行する。
$db_result_id = mysqli_query($db_link, $strSQL_id);

$db_result_pass = mysqli_query($db_link, $strSQL_pass);

//取得したデータ件数を調べる
$db_cnt_id = mysqli_num_rows($db_result_id);

$db_cnt_pass = mysqli_num_rows($db_result_pass);

if ($db_cnt_id == 0) {
    print "ユーザーIDが間違っています";
} elseif ($db_cnt_pass == 0) {
    print "パスワードが間違っています";
} else {
    header("location:kigyou.php");
    //データが有る場合
    //while ($db_row = mysqli_fetch_array($db_result_id)) {
        //print "ようこそ".$db_row["cus_name"]."さん";
    //}
}

mysqli_free_result($db_result_id);

mysqli_free_result($db_result_pass);

//MySqlサーバ切断
mysqli_close($db_link);

?>
</body>

</html>