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
$strtoukou = $_POST['toukou'];
$strtagu = $_POST['tagu'];


//session_start();
//$_SESSION['dbName'] = $strrand;
//var_dump($_SESSION['dbName']);
//print "$strrand";
//print "$strtoukou";
   

    //ランダムな文字列を生成する
    $strrand_a = chr(mt_rand(97, 122)) . chr(mt_rand(97, 122)) . chr(mt_rand(97, 122)) .
                chr(mt_rand(97, 122)) . chr(mt_rand(97, 122)) . chr(mt_rand(97, 122));
    //重複判定
    $strSQL  = " select * from kigyou_tbl where rand = '$strrand_a'";

    $db_result = mysqli_query($db_link, $strSQL);

    $db_cnt = mysqli_num_rows($db_result);

    if ($db_cnt == 0) {

        //SQL文の作成
        $strSQL = " insert into $strrand(massage,tag,rand_a) values ('".$strtoukou."','".$strtagu."','".$strrand_a."') ";

        //SQL文を実行する
        $db_result = mysqli_query($db_link, $strSQL);

        if ($db_result = false) {
            //insertの失敗
            $msg = "投稿が失敗しました。".$strSQL;
        } else {
        
            //insertの成功
            $strSQL = " create table $strrand_a(id int primary key not null auto_increment,massage_a text); ";

            $db_result = mysqli_query($db_link, $strSQL);

            if ($db_result == true) {
                $msg = "投稿が完了しました。";
            } else {
                $msg = "投稿が失敗しました。".$strSQL;
            }
        }
    } else {
        $msg = "既存の判定になりました。大変申し訳ないのですが、もう一度やり直してください。";
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
    <link rel="stylesheet" href="./css/toukou_out.css">
    <link rel="shortcut icon" href="">
</head>

<body>
    <header><img src="images/top_logo.png" alt="就活の翼"></header>
    <div id="wrap">

        <?php
//  表示部
print $msg;
print "<form method=\"post\" action=\"top.php\">";
print "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">";
print "</input>";
print "<input type=\"submit\" value=\"topへ\" name=\"sub\">";
print "</input>";
print "</form>";

?>
    </div>

</body>

</html>