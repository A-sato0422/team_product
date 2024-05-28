<?php
require_once './encode.php';
session_start();

//delete_nameが送信された商品名を削除 
$delete_name = e($_POST['delete_name'] ?? '');
if ($delete_name != '') unset($_SESSION['products'][$delete_name]);

$products = $_SESSION['products'] ?? [];
$total = 0;
$subtotal = 0;
// カートの合計の計算
foreach ($products as $name => $product) {
    $subtotal = (int)$product['price'] * (int)$product['count'];
    $total += $subtotal;
}

?>
<!DOCTYPE html>
<html>

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-13xxxxxxxxx"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-13xxxxxxxxx');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>商品一覧｜SQUARE, inc.</title>
    <meta name="description" content="ここにサイトの説明文">

    <meta property="og:title" content="SQUARE, inc." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://ドメイン/img/bg.png" />
    <meta property="og:url" content="https://ドメイン" />
    <meta property="og:description" content="SQUARE, inc.のコーポレートサイトです">

    <link rel="icon" href="favicon.ico">

    <!-- css -->
    <link rel="stylesheet" href="./cart.css">
    <link rel="stylesheet" href="./style.css">
    <!-- icon -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="nav">
            <!-- <input type="checkbox" id="menu-toggle" class="checkbox-visually-hidden"> -->
            <!-- <p for="menu-toggle" class="menu-toggle-label">14時まで即日配送</p> -->
            <!-- スマホ用 menu icon -->
            <div class="menu">
                <div class="nav-icon" id="menu-icon">
                    <div class="nav-bar top"></div>
                    <div class="nav-bar middle"></div>
                    <div class="nav-bar bottom"></div>
                </div>
            </div>
            <!-- overlay -->
            <div id="overlay"></div>

            <!-- menu-content -->
            <div id="menu-content">
                <ul class="overlay-items">
                    <li><a href="./list_page.html" class="overlay-item">商品を探す</a></li>
                    <li><a href="#" class="overlay-item">特集一覧</a></li>
                    <li><a href="#" class="overlay-item">お気に入り</a></li>
                    <li><a href="#" class="overlay-item">ご利用ガイド</a></li>
                    <li><a href="#" class="overlay-item">店舗一覧</a></li>
                </ul>
                <ul class="overlay-login">
                    <li><a href="#">カート</a></li>
                    <li><a href="#">新規ログイン</a></li>
                </ul>
            </div>

            <ul class="menu-group" id="menu-group">
                <a href="./index.html">
                    <img src="./img/wine.svg" alt="ホームページロゴ" width="45px" height="45px">
                </a>
                <li class="menu-item"><a href="./list_page.html">商品を探す</a></li>
                <li class="menu-item"><a href="#">特集一覧</a></li>
                <li class="menu-item"><a href="#">お気に入り</a></li>
                <li class="menu-item"><a href="#">ご利用ガイド</a></li>
                <li class="menu-item"><a href="#">店舗一覧</a></li>
                <img src="./img/search.svg" alt="検索" width="25px" height="25px">
                <a href="./cart.php">
                    <img src="./img/cart.svg" alt="カート" width="25px" height="25px">
                </a>
                <a href="./register.html">
                    <img src="./img/user-solid.svg" alt="user" width="25px" height="25px">
                </a>
            </ul>
        </nav>
    </header>

    <main>
        <div class="wrapper last-wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>MY CART</h3>
                    <p>カート</p>
                </div>
                <div class="cartlist">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>個数</th>
                                <th>小計</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $name => $product) : ?>
                                <tr>
                                    <td label="商品名："><?= $name; ?></td>
                                    <td label="価格：" class="text-right"><?= $product['price']; ?></td>
                                    <td label="個数：" class="text-right"><?= $product['count']; ?></td>
                                    <td label="小計：" class="text-right"><?= $product['price'] * $product['count']; ?></td>
                                    <td>
                                        <form action="cart.php" method="POST">
                                            <input type="hidden" name="delete_name" value="<?= $name; ?>">
                                            <button type="submit" class="btn btn-red">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="total">
                                <th colspan="3">合計</th>
                                <td colspan="2"><?= $total; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-btn">
                        <button type="button" class="btn btn-blue">購入手続きへ</button>
                        <a href="./list_page.html">
                            <button type="button" class="btn btn-gray">お買い物を続ける</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./main.js"></script>

</body>

</html>