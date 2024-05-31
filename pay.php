<?php
session_start();
$user = $_SESSION['user'] ?? [];
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
    <link rel="stylesheet" href="./dropdown_UI.css">

    <!-- icon -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="nav">
            <!-- <input type="checkbox" id="menu-toggle" class="checkbox-visually-hidden"> -->
            <!-- <label for="menu-toggle" class="menu-toggle-label">14時まで即日配送</label> -->
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
                    <li><a href="./list_page.php" class="overlay-item">商品を探す</a></li>
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
                <a href="index.php">
                    <img src="./img/wine.svg" alt="ホームページロゴ" width="45px" height="45px">
                </a>
                <li class="menu-item"><a href="./list_page.php">商品を探す</a></li>
                <li class="menu-item"><a href="#">特集一覧</a></li>
                <li class="menu-item"><a href="#">お気に入り</a></li>
                <li class="menu-item"><a href="#">ご利用ガイド</a></li>
                <li class="menu-item"><a href="#">店舗一覧</a></li>
                <img src="./img/search.svg" alt="検索" width="25px" height="25px">
                <a href="./cart.php">
                    <img src="./img/cart.svg" alt="カート" width="25px" height="25px">
                </a>
                <div class="dropdown-container">
                    <button class="btn" id="btn">
                        <img src="./img/user-solid.svg" alt="user" width="25px" height="25px">
                        <?php isset($user['name']) ? print $user['name'] . "さん" : print "アカウント"; ?>
                        <i class="bx bx-chevron-down" id="arrow"></i>
                    </button>

                    <div class="dropdown" id="dropdown">
                        <a href="./register.php">
                            <i class="bx bx-plus-circle"></i>
                            新規会員登録
                        </a>
                        <a href="<?php isset($_SESSION['user']) ? print "./logout.php" : print "login.php" ?>">
                            <i class="bx bx-user"></i>
                            <?php isset($_SESSION['user']) ? print "ログアウト" : print "ログイン"  ?>
                        </a>
                    </div>
                </div>
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
                <form class="pay_form" action="pay_conf.php" method="POST">
                    <div class="pay_form_container">
                        <div class="form-group">
                            <label for="name">お名前 *</label>
                            <input type="text" id="name" name="name" value="<?= $user['name'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mail">Email *</label>
                            <input type="mail" id="mail" name="mail" value="<?= $user['email'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号(ハイフンなし) *</label>
                            <input type="number" id="tel" name="tel" value="<?= $user['tel'] ?? ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">お届け先 *</label>
                            <div class="sub-group">
                                <label for="postcode">郵便番号(ハイフンなし)</label>
                                <input type="number" id="postcode" name="postcode" value="<?= $user['postcode'] ?? ''; ?>" required>
                                <label for="address">住所</label>
                                <input type="text" id="address" name="address" value="<?= $user['address'] ?? ''; ?>" required>
                            </div>
                        </div>
                        <button class="btn btn-blue" type="submit">購入する</button>
                    </div>
                </form>

            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./main.js"></script>

</body>

</html>