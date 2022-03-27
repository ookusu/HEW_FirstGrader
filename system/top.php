<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
?>
<html>

<head>
    <title>top</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/top.css">
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
//$_SESSION['dbName'] = $strrand;
//$strrand = $_SESSION['dbName'];
//var_dump($strrand);


?>

    <header><img src="images/top_logo.png" alt="就活の翼"></header>

    <div id="wrap">

        <div class="submit_top">

            <a class="a" href="kigyou.php"><input type="button" value="企業選択へ"></input></a>

            <form method="post" action="toukou_in.php">
                <input type="hidden" value="<?php print $strrand ?>"
                    name="rand"></input>
                <div class="toukou">
                    <input type="submit" value="投稿する" name="toukou_sub"></input>
                </div>
            </form>
            <form method="post" action="toukou_in.php">
                <input type="hidden" value="<?php print $strrand ?>"
                    name="rand"></input>
                <div class="sa-ti">
                    <input type="submit" value="絞り込む" name="tagu_sub"></input>
                </div>
            </form>

        </div>


        <?php



if (isset($_POST['motimono_sub'])) {
    $strtagu = $_POST['tagu'];

    //SQL文の作成
    $strSQL = " select * from $strrand where tag = '$strtagu' ";

    //SQL文を実行する
    $db_result = mysqli_query($db_link, $strSQL);

    //取得したデータ件数を調べる
    $db_cnt = mysqli_num_rows($db_result);
    //var_dump($db_cnt);


    if ($db_cnt == 0) {
        //データがない場合
        print "<font color = red>";
        print "投稿がありません。";
        print "</font>";
    } else {
        while ($db_row = mysqli_fetch_array($db_result)) {
            print "<form action = \"re_top.php\" method = \"post\">";
            print "<input type = \"hidden\" value = \"".$db_row["rand_a"]."\" name = \"rand_a\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$strrand."\" name = \"rand\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$db_row["massage"]."\" name = \"massage\">";
            print "</input>";
            print "<div class=\"top\">";
            print "<p>".$db_row['massage']."</p>";
            print "<input type = \"submit\" value =\"返信\" name = \"subDel\">";
            print "</div>";
            print "</input>";
            print "</form>";
        }
        mysqli_free_result($db_result);
    }
} elseif (isset($_POST['mensetu_sub'])) {
    $strtagu = $_POST['tagu'];
    
    //SQL文の作成
    $strSQL = " select * from $strrand where tag = '$strtagu' ";

    //SQL文を実行する
    $db_result = mysqli_query($db_link, $strSQL);

    //取得したデータ件数を調べる
    $db_cnt = mysqli_num_rows($db_result);
    //var_dump($db_cnt);


    if ($db_cnt == 0) {
        //データがない場合
        print "<font color = red>";
        print "投稿がありません。";
        print "</font>";
    } else {
        while ($db_row = mysqli_fetch_array($db_result)) {
            print "<form action = \"re_top.php\" method = \"post\">";
            print "<input type = \"hidden\" value = \"".$db_row["rand_a"]."\" name = \"rand_a\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$strrand."\" name = \"rand\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$db_row["massage"]."\" name = \"massage\">";
            print "</input>";
            print "<div class=\"top\">";
            print "<p>".$db_row['massage']."</p>";
            print "<input type = \"submit\" value =\"返信\" name = \"subDel\">";
            print "</div>";
            print "</input>";
            print "</form>";
        }
        mysqli_free_result($db_result);
    }
} elseif (isset($_POST['siken_sub'])) {
    $strtagu = $_POST['tagu'];
    
    //SQL文の作成
    $strSQL = " select * from $strrand where tag = '$strtagu' ";

    //SQL文を実行する
    $db_result = mysqli_query($db_link, $strSQL);

    //取得したデータ件数を調べる
    $db_cnt = mysqli_num_rows($db_result);
    //var_dump($db_cnt);


    if ($db_cnt == 0) {
        //データがない場合
        print "<font color = red>";
        print "投稿がありません。";
        print "</font>";
    } else {
        while ($db_row = mysqli_fetch_array($db_result)) {
            print "<form action = \"re_top.php\" method = \"post\">";
            print "<input type = \"hidden\" value = \"".$db_row["rand_a"]."\" name = \"rand_a\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$strrand."\" name = \"rand\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$db_row["massage"]."\" name = \"massage\">";
            print "</input>";
            print "<div class=\"top\">";
            print "<p>".$db_row['massage']."</p>";
            print "<input type = \"submit\" value =\"返信\" name = \"subDel\">";
            print "</div>";
            print "</input>";
            print "</form>";
        }
        mysqli_free_result($db_result);
    }
} elseif (isset($_POST['sikaku_sub'])) {
    $strtagu = $_POST['tagu'];
    
    //SQL文の作成
    $strSQL = " select * from $strrand where tag = '$strtagu' ";

    //SQL文を実行する
    $db_result = mysqli_query($db_link, $strSQL);

    //取得したデータ件数を調べる
    $db_cnt = mysqli_num_rows($db_result);
    //var_dump($db_cnt);


    if ($db_cnt == 0) {
        //データがない場合
        print "<font color = red>";
        print "投稿がありません。";
        print "</font>";
    } else {
        while ($db_row = mysqli_fetch_array($db_result)) {
            print "<form action = \"re_top.php\" method = \"post\">";
            print "<input type = \"hidden\" value = \"".$db_row["rand_a"]."\" name = \"rand_a\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$strrand."\" name = \"rand\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$db_row["massage"]."\" name = \"massage\">";
            print "</input>";
            print "<div class=\"top\">";
            print "<p>".$db_row['massage']."</p>";
            print "<input type = \"submit\" value =\"返信\" name = \"subDel\">";
            print "</div>";
            print "</input>";
            print "</form>";
        }
        mysqli_free_result($db_result);
    }
} elseif (isset($_POST['nayami_sub'])) {
    $strtagu = $_POST['tagu'];
    
    //SQL文の作成
    $strSQL = " select * from $strrand where tag = '$strtagu' ";

    //SQL文を実行する
    $db_result = mysqli_query($db_link, $strSQL);

    //取得したデータ件数を調べる
    $db_cnt = mysqli_num_rows($db_result);
    //var_dump($db_cnt);


    if ($db_cnt == 0) {
        //データがない場合
        print "<font color = red>";
        print "投稿がありません。";
        print "</font>";
    } else {
        while ($db_row = mysqli_fetch_array($db_result)) {
            print "<form action = \"re_top.php\" method = \"post\">";
            print "<input type = \"hidden\" value = \"".$db_row["rand_a"]."\" name = \"rand_a\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$strrand."\" name = \"rand\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$db_row["massage"]."\" name = \"massage\">";
            print "</input>";
            print "<div class=\"top\">";
            print "<p>".$db_row['massage']."</p>";
            print "<input type = \"submit\" value =\"返信\" name = \"subDel\">";
            print "</div>";
            print "</input>";
            print "</form>";
        }
        mysqli_free_result($db_result);
    }
} else {
    
//SQL文の作成
    $strSQL = " select * from $strrand ";

    //SQL文を実行する
    $db_result = mysqli_query($db_link, $strSQL);

    //取得したデータ件数を調べる
    $db_cnt = mysqli_num_rows($db_result);
    //var_dump($db_cnt);


    if ($db_cnt == 0) {
        //データがない場合
        print "<font color = red>";
        print "投稿がありません。";
        print "</font>";
    } else {
        while ($db_row = mysqli_fetch_array($db_result)) {
            print "<form action = \"re_top.php\" method = \"post\">";
            print "<input type = \"hidden\" value = \"".$db_row["rand_a"]."\" name = \"rand_a\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$strrand."\" name = \"rand\">";
            print "</input>";
            print "<input type = \"hidden\" value = \"".$db_row["massage"]."\" name = \"massage\">";
            print "</input>";
            print "<div class=\"top\">";
            print "<p>".$db_row['massage']."</p>";
            print "<input type = \"submit\" value =\"返信\" name = \"subDel\">";
            print "</div>";
            print "</input>";
            print "</form>";
        }
        mysqli_free_result($db_result);
    }
}



mysqli_close($db_link);


?>

    </div>
</body>

</html>