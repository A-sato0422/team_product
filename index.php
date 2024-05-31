<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// 画面上部にセッション情報を表示
// if ($user) {
//     echo $user['name'];
//     echo "<br>";
//     echo $user['email'];
//     echo "<br>";
//     echo $user['tel'];
//     echo "<br>";
//     echo $user['postcode'];
//     echo "<br>";
//     echo $user['address'];
//     echo "<br>";
// }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">
    <!-- slickのCSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <!-- 無料ライブラリ Boxicons の追加 -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- オリジナル CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dropdown_UI.css">
    <title>B班課題制作</title>
</head>

<body>
    <header>
        <nav class="nav">
            <input type="checkbox" id="menu-toggle" class="checkbox-visually-hidden">
            <label for="menu-toggle" class="menu-toggle-label">14時まで即日配送</label>
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
                <a href="#">
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
    <div class="carousel">
        <ul class="slide-items">
            <li><img src="./img/fastview1.png" alt=""></li>
            <li><img src="./img/fastview2.png" alt=""></li>
            <li><img src="./img/fastview3.png" alt=""></li>
            <li><img src="./img/fastview1.png" alt=""></li>
            <li><img src="./img/fastview2.png" alt=""></li>
            <li><img src="./img/fastview3.png" alt=""></li>
        </ul>
    </div>

    <div class="category1">
        <span class="Liquorsearch">お酒を探す</span>
        <ul>
            <li class="button01"></li>
            <li class="button02"></li>
            <li class="button03"></li>
            <li class="button04"></li>
            <li class="button05"></li>
            <li class="button06"></li>
            <li class="button07"></li>
            <li class="button08"></li>
            <li class="button09"></li>


        </ul>
    </div>
    <div class="bestsellers-section">
        <h2>ベストセラー</h2>
        <div class="product-container">
            <div class="product">
                <img src="./img/wine1.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine2.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine3.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine4.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine5.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine6.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine7.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine8.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine9.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <div class="product">
                <img src="./img/wine10.webp" alt="商品1">
                <p class="product-name">商品名1</p>
                <p class="product-description">商品の説明1</p>
            </div>
            <!-- 他の商品の情報をここに追加 -->
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div class="content-box">
                <div class="footer-section">
                    <h3>会社情報</h3>
                    <p>〒920-8217 石川県金沢市近岡町８４５−１</p>
                    <p>TEL: 012-3456-7890</p>
                    <p>Email: info@example.com</p>
                </div>
                <div class="footer-section">
                    <h3>リンク</h3>
                    <p><a href="#">会社概要</a></p>
                    <p><a href="#">サービス</a></p>
                    <p><a href="#">お問い合わせ</a></p>
                </div>
                <div class="footer-section">
                    <h3>フォローする</h3>
                    <p><a href="#">Facebook</a></p>
                    <p><a href="#">Twitter</a></p>
                    <p><a href="#">Instagram</a></p>
                </div>
            </div>
            <div class="cash">
                <h2>お支払い方法</h2>
                <p>地酒.com では下記のお支払い方法がご利用いただけます。</p>
                <div class="cash-icons">
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                </div>
                <ul>
                    <li>クレジットカード決済</li>
                    <li>Amazon Pay</li>
                    <li>Google Pay</li>
                    <li>Apple Pay</li>
                    <li>PayPay（オンライン決済）</li>
                    <li>楽天Pay（オンライン決済）</li>
                    <li>au Pay（オンライン決済）</li>
                    <li>d払い（キャリア決済）</li>
                    <li>ソフトバンクまとめて支払い（キャリア決済）</li>
                    <li>LINE Pay（オンライン決済）</li>
                    <li>コンビニ前払い（ファミリーマート/セブンイレブン/ローソン/ミニストップ）</li>
                    <li>あと払い（ペイディ）</li>
                    <li>銀行振込</li>
                    <li>代金引換</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 地酒店</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <!-- slickのJavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- オリジナル js -->
    <script src="./main.js"></script>
</body>

</html>