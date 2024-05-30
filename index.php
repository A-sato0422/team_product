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
                <a href="#">
                    <img src="./img/地酒.com 候補5.png" alt="ホームページロゴ" width="15%" height="15%">
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
                        <a href="./login.php">
                            <i class="bx bx-user"></i>
                            ログイン
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
    <span class="bestseller">ベストセラー</span>
        <div class="product-container">
            <div class="product">
                <img src="./img/wine1.webp" alt="商品1">
                <p class="product-name">オーパス ワン 2017年 Opus One カリフォルニア 750ml 赤ワイン アメリカ</p>
                <p class="product-description">\64000</p>
            </div>
            <div class="product">
                <img src="./img/wine2.webp" alt="商品1">
                <p class="product-name">オーバーチュア NV カリフォルニア 750ml 赤ワイン オーヴァチャー OVERTURE アメリカ ナパヴァレー</p>
                <p class="product-description">\30000</p>
            </div>
            <div class="product">
                <img src="./img/wine3.webp" alt="商品1">
                <p class="product-name">ナパ ハイランズ カベルネ ソーヴィニヨン ナパ ヴァレー 2022 750ml 赤ワイン アメリカ カリフォルニア フルボディ</p>
                <p class="product-description">\6400</p>
            </div>
            <div class="product">
                <img src="./img/wine4.webp" alt="商品1">
                <p class="product-name">ナパ ハイランズ カベルネ ソーヴィニヨン ナパ ヴァレー 2022 750ml 赤ワイン アメリカ カリフォルニア フルボディ</p>
                <p class="product-description">\4000</p>
            </div>
            <div class="product">
                <img src="./img/wine5.webp" alt="商品1">
                <p class="product-name">オーパス ワン 2016年 Opus One カリフォルニア 750ml 赤ワイン アメリカ</p>
                <p class="product-description">\45000</p>
            </div>
            <div class="product">
                <img src="./img/wine6.webp" alt="商品1">
                <p class="product-name">プピーユ 2017 750ml 赤ワイン フランス ボルドー フルボディ</p>
                <p class="product-description">\4400</p>
            </div>
            <div class="product">
                <img src="./img/wine7.webp" alt="商品1">
                <p class="product-name">オーパス ワン 2018年 Opus One カリフォルニア 750ml 赤ワイン アメリカ</p>
                <p class="product-description">\50000</p>
            </div>
            <div class="product">
                <img src="./img/wine8.webp" alt="商品1">
                <p class="product-name">ザ プリズナー ワイン カンパニー アンシャックルド カベルネ ソーヴィニヨン 2021 750ml 赤ワイン アメリカ カリフォルニア フルボディ</p>
                <p class="product-description">\4270</p>
            </div>
            <div class="product">
                <img src="./img/wine9.webp" alt="商品1">
                <p class="product-name">689 セラーズ シックス エイト ナイン ナパ ヴァレー レッド 2020 750ml 赤ワイン アメリカ カリフォルニア フルボディ</p>
                <p class="product-description">\3000</p>
            </div>
            <div class="product">
                <img src="./img/wine10.webp" alt="商品1">
                <p class="product-name">デコイ カベルネ ソーヴィニヨン カリフォルニア 2021 750ml 赤ワイン アメリカ カリフォルニア ミディアムボディ ダックホーン</p>
                <p class="product-description">\2550</p>
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
                    <img src="./img/支払方法.png" alt="">
                    <!-- <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div>
                    <div class="cash-icon">amazon</div> -->
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