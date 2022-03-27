<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
$strrand = $_POST['rand'];
$strrand_a = $_POST['rand_a'];
$strmas = $_POST['massage'];
?>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/re_in.css">
    <link rel="shortcut icon" href="">
</head>

<body>

<header><img src="images/top_logo.png" alt="就活の翼"></header>

<div id="wrap">

    <?php
//  表示部

        print "<h1>"."投稿"."</h1>";
        print "<br />"."<br />";
        print "<form method=\"post\" action=\"re_out.php\">";
        print "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">";
        print "</input>";
        print "<input type=\"hidden\" value=\"$strmas\" name=\"massage\">";
        print "</input>";
        print "<input type=\"hidden\" value=\"$strrand_a\" name=\"rand_a\">";
        print "</input>";
        print "<textarea name=\"toukou_a\" />"."</textarea>";

        print "<br />"."<br />"."<br />";
        print "<input type=\"submit\" value=\"投稿\" />";
        print "<input type=\"reset\" value=\"入力クリア\" />";
        print "</form>";

?>

</div>

</body>

</html>