<?php
require_once "./encode.php";

$name = e($_POST['name'] ?? "");
$mail = e($_POST['mail'] ?? "");
$tel = e($_POST['tel'] ?? "");
$postcode = e($_POST['postcode'] ?? "test");
$address = e($_POST['address'] ?? "");

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

    <title>購入手続き｜SQUARE, inc.</title>
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
                <a href="./register.php">
                    <img src="./img/user-solid.svg" alt="user" width="25px" height="25px">
                </a>
            </ul>
        </nav>
    </header>

    <main>
        <div class="wrapper last-wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>PAYMENT</h3>
                    <p>購入手続き</p>
                </div>
                <form class="pay_form" action="pay_end.php" method="POST">
                    <div class="pay_form_container">
                        <div class="form-group">
                            <label for="name">お名前 *</label>
                            <p><?= $name; ?></p>
                            <input type="hidden" name="name" value="<?= $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="mail">Email *</label>
                            <p><?= $mail; ?></p>
                            <input type="hidden" name="mail" value="<?= $mail; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号 *</label>
                            <p><?= $tel; ?></p>
                            <input type="hidden" name="tel" value="<?= $tel; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">お届け先 *</label>
                            <div class="sub-group">
                                <label for="postcode">郵便番号</label>
                                <p><?= $postcode; ?></p>
                                <input type="hidden" name="postcode" value="<?= $postcode; ?>">
                                <label for="address">住所</label>
                                <p><?= $address; ?></p>
                                <input type="hidden" name="address" value="<?= $address; ?>">
                            </div>
                        </div>
                        <p>この内容で送信してよろしいですか？</p>
                        <button class="btn btn-blue" type="submit">購入する</button>
                        <button class="btn btn-gray" type="button" onclick="location.href='./pay.php'">修正する</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./main.js"></script>

</body>

</html>