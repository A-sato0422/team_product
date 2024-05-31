<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./dropdown_UI.css">

    <title>新規登録 | 地酒.com</title>
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
                        アカウント
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

    <section class="register">
        <div class="container">
            <div class="register-title">
                <h2>LOGIN</h2>
                <h4>ログイン</h4>
            </div>

            <form method="POST" action="index.php">
                <div class="form-group">
                    <label for="email">Email *</label><br>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">パスワード *</label><br>
                    <input type="password" id="password" name="password" placeholder="8桁以上の半角英数字でお願いします" required>
                </div>
               
                <input type="submit" value="ログイン" class="submit">
            </form>
        </div>
    </section>

    <script src="./main.js"></script>
</body>

</html>