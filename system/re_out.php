<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部



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
$strrand = $_POST['rand'];
$strtoukou = $_POST['toukou_a'];
$strrand_a = $_POST['rand_a'];
$strmas = $_POST['massage'];


//session_start();
//$_SESSION['dbName'] = $strrand;
//var_dump($_SESSION['dbName']);
//print "$strrand";
//print "$strtoukou";
   


        //SQL文の作成
        $strSQL = " insert into $strrand_a(massage_a) values ('".$strtoukou."') ";

        //SQL文を実行する
        $db_result = mysqli_query($db_link, $strSQL);

        if ($db_result = false) {
            //insertの失敗
            $msg = "投稿が失敗しました。".$strSQL;
        } else {
        
            //insertの成功
            $msg = "投稿が完了しました。";
        }


?>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/re_out.css">
    <link rel="shortcut icon" href="">
</head>

<body>
<header><img src="images/top_logo.png" alt="就活の翼"></header>
<div id="wrap">


    <?php
//  表示部
print $msg;
print "<form method=\"post\" action=\"re_top.php\">";
print "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">";
print "</input>";
print "<input type=\"hidden\" value=\"$strmas\" name=\"massage\">";
print "</input>";
print "<input type=\"hidden\" value=\"$strrand_a\" name=\"rand_a\">";
print "</input>";
print "<input type=\"submit\" value=\"返信topへ\" name=\"sub\">";
print "</input>";
print "</form>";

?>
</div>
</body>

</html>