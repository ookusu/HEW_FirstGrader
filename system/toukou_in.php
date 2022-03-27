<!DOCTYPE html>
<?php
header("Content-Type:text/html; charset=UTF-8");
?>
<?php
//  処理部
$strrand = $_POST['rand'];
?>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/toukou_in.css">
    <link rel="shortcut icon" href="">
</head>

<body>
    <?php
//  表示部

        print "<header>"."<img src=\"images/top_logo.png\" alt=\"就活の翼\">"."</header>";
        print "<div id=\"wrap\">";

    if (isset($_POST['toukou_sub'])) {
        print   "<h1>"."投稿"."</h1>";
        print   "<br />"."<br />";
        print   "<form method=\"post\" action=\"toukou_out.php\">";
        print       "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">";
        print       "</input>";
        print       "<textarea name=\"toukou\" />"."</textarea>"."<br />";
        print       "<div class=\"sel sel_a\">";
        print       "<select name=\"tagu\">";
        print           "<option value=\"none\">"."設定しない"."</option>";
        print           "<option value=\"motimono\">"."持ち物"."</option>";
        print           "<option value=\"mensetu\">"."面接"."</option>";
        print           "<option value=\"siken\">"."試験"."</option>";
        print           "<option value=\"sikaku\">"."資格"."</option>";
        print           "<option value=\"nayami\">"."悩み"."</option>";
        print       "</select>";
        print       "</div>";

        print       "<br />"."<br />"."<br />";
        print       "<input type=\"submit\" value=\"投稿\" />";
        print       "<input type=\"reset\" value=\"入力クリア\" />";
        print   "</form>";
    } elseif (isset($_POST['tagu_sub'])) {
        print "<form method=\"post\" action=\"top.php\">".
        "<input type=\"hidden\" value=\"motimono\" name=\"tagu\">"."</input>".
        "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">"."</input>".
        "<div class=\"tagu\">".
        "<input type=\"submit\" value=\"持ち物\" name=\"motimono_sub\">"."</input>".
        "</div>".
        "</form>";

        print "<form method=\"post\" action=\"top.php\">".
        "<input type=\"hidden\" value=\"mensetu\" name=\"tagu\">"."</input>".
        "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">"."</input>".
        "<div class=\"tagu\">".
        "<input type=\"submit\" value=\"面接\" name=\"mensetu_sub\">"."</input>".
        "</div>".
        "</form>";

        print "<form method=\"post\" action=\"top.php\">".
        "<input type=\"hidden\" value=\"siken\" name=\"tagu\">"."</input>".
        "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">"."</input>".
        "<div class=\"tagu\">".
        "<input type=\"submit\" value=\"試験\" name=\"siken_sub\">"."</input>".
        "</div>".
        "</form>";

        print "<form method=\"post\" action=\"top.php\">".
        "<input type=\"hidden\" value=\"sikaku\" name=\"tagu\">"."</input>".
        "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">"."</input>".
        "<div class=\"tagu\">".
        "<input type=\"submit\" value=\"資格\" name=\"sikaku_sub\">"."</input>".
        "</div>".
        "</form>";

        print "<form method=\"post\" action=\"top.php\">".
        "<input type=\"hidden\" value=\"nayami\" name=\"tagu\">"."</input>".
        "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">"."</input>".
        "<div class=\"tagu\">".
        "<input type=\"submit\" value=\"悩み\" name=\"nayami_sub\">"."</input>".
        "</div>".
        "</form>";

        print "<form method=\"post\" action=\"top.php\">".
        "<input type=\"hidden\" value=\"$strrand\" name=\"rand\">"."</input>".
        "<div class=\"tagu\">".
        "<input type=\"submit\" value=\"すべて表示\" name=\"zen_sub\">"."</input>".
        "</div>".
        "</form>";
    }
        print "</div>";

?>

</body>

</html>