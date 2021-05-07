<?php

define('UPLOADPATH','../../img/');

require_once('../../php/others/common.php');
require_once('../../php/others/db_connect.php');

$code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_NUMBER_INT);

$dbh = db_connect();
$dbh -> setAttribute(PDO::MYSQL_ATTR_MULTI_STATEMENTS, false);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$dbh -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$sql = 'SELECT code,category,title,date,news,image FROM news WHERE code=:code';
$stmt = $dbh->prepare($sql);
$stmt -> bindValue(':code', (int)$code, PDO::PARAM_INT);
$stmt -> execute();
$rec = $stmt->fetch();
$dbh = null;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/news_item.css">
</head>
<body>

    <div class="container">

        <header id="header" class="top_img">
                <nav>
                    <ul class="header_nav_items">
                        <li>
                            <div class="header_nav_item"><a class="header_nav_item_link" href="../index.php">Top</a></div>
                        </li>
                        <li>
                            <div class="header_nav_item"><a class="header_nav_item_link" href="../about.html">About</a></div>
                        </li>
                        <li>
                            <div class="header_nav_item"><a class="header_nav_item_link" href="../product.php">Product</a></div>
                        </li>
                        <li>
                            <div class="header_nav_item"><a class="header_nav_item_link" href="../news.php">News</a></div>
                        </li>
                        <li>
                            <div class="header_nav_item"><a class="header_nav_item_link" href="../contact.php">Contact</a></div>
                        </li>
                    </ul>
                </nav>
                <h1 class="top_title">News</h1>
        </header>
        <div>
            <div class="scroll_top">TOP</div>
        </div>
    


        <main>

        </main>
    
    
    
        <footer>
            <div class="footer_nav">
                <nav>
                    <ul class="footer_nav_items">
                        <li class="footer_nav_item"><a href="../index.php">Top</a></li>
                        <li class="footer_nav_item"><a href="../about.html">About</a></li>
                        <li class="footer_nav_item"><a href="../product.php">Product</a></li>
                        <li class="footer_nav_item"><a href="../news.php">News</a></li>
                        <li class="footer_nav_item"><a href="../contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="footer_copyright">
                <small>©ryotak</small>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"> </script>
    <script src="../../js/main.js"> </script>
    <script src="../../js/news.js"> </script>
</body>
</html>