<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>地酒.com | 商品一覧</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- slickのCSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="./list_page.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./dropdown_UI.css">
</head>

<body id="top" class="font-poppins">

    <!-- header section -->
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

    <!-- main section -->
    <main>
        <div class="kind-title">
            <h2>ワイン</h2>
        </div>
        <div class="item-sort">
            <p>商品数(<span>672</span>)</p>
            <p>並べ替え<i class="fa-solid fa-chevron-down"></i></p>
        </div>

        <div class="main-contents">
            <div class="search-field">
                <ul class="accordion-area">
                    <li>
                        <section>
                            <h3 class="title">産地</h3>
                            <ul class="search-content">
                                <li><input type="checkbox" id="gunma"><label for="gunma">群馬県</label></li>
                                <li><input type="checkbox" id="ishikawa"><label for="ishikawa">石川</label></li>
                                <li><input type="checkbox" id="toyama"><label for="toyama">富山</label></li>
                                <li><input type="checkbox" id="hukui"><label for="hukui">福井</label></li>
                            </ul>
                        </section>
                    </li>
                    <li>
                        <section>
                            <h3 class="title">酒造</h3>
                            <ul class="search-content">
                                <li><input type="checkbox" id="nagata"><label for="nagata">永井酒造</label></li>
                                <li><input type="checkbox" id="toyota"><label for="toyota">豊田酒造</label></li>
                                <li><input type="checkbox" id="aoki"><label for="aoki">青木酒造</label></li>
                            </ul>
                        </section>
                    </li>
                    <li>
                        <section>
                            <h3 class="title">銘柄</h3>
                            <ul class="search-content">
                                <li><input type="checkbox" id="tanigawa"><label for="tanigawa">谷川岳</label></li>
                            </ul>
                        </section>
                    </li>
                    <li>
                        <section>
                            <h3 class="title">仕様</h3>
                            <ul class="search-content">
                                <li><input type="checkbox" id="bottle"><label for="bottle">ボトルのみ</label></li>
                            </ul>
                        </section>
                    </li>
                    <li>
                        <section>
                            <h3 class="title">価格</h3>
                            <ul class="search-content">
                                <li><input type="checkbox" id="5000"><label for="5000">~￥5,000</label></li>
                                <li><input type="checkbox" id="10000"><label for="10000">￥5,000~￥10,000</label></li>
                                <li><input type="checkbox" id="15000"><label for="15000">￥10,000~￥15,000</label></li>
                                <li><input type="checkbox" id="20000"><label for="20000">￥15,000~￥20,000</label></li>
                            </ul>
                        </section>
                    </li>
                </ul>
                <div class="search-btn">
                    <button class="btn">この条件で検索する</button>
                </div>
            </div>

            <div class="item-field">
                <div class="w-full">
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-7">
                        <a href="./product.php" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake01.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">ジェーン エア ジュヴレ シャンベルタン プルミエ クリュ レ コルボー 2021 750ml 赤ワイン フランス
                                    ブルゴーニュ ミディアムボディ</p>
                                <p class="item-price font-bold text-3xl mt-4">¥32,000 （税込）</p>
                            </div>
                        </a>
                        <a href="./product_02.php" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./img/wine4.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">ジェーン エア ジュヴレ シャンベルタン 2020 750ml 赤ワイン フランス ブルゴーニュ ミディアムボディ</p>
                                <p class="item-price font-bold text-3xl mt-4">¥11,800 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake03.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">ドメーヌ アラン ビュルゲ ジュヴレ シャンベルタン メ ファヴォリット ヴィエイユ ヴィーニュ 2021 750ml
                                    赤ワイン フランス ブルゴーニュ ミディアムボディ</p>
                                <p class="item-price font-bold text-3xl mt-4">¥14,500 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake04.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">[母の日ギフト] サッシカイア グイダルベルト ＆ Zalto ワイングラス ギフトセット</p>
                                <p class="item-price font-bold text-3xl mt-4">¥15,000 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake12.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">[母の日ギフト] ドメーヌ ルージョ サン ロマン＆木村硝子店 サヴァ 12oz ワイングラス ギフトセット</p>
                                <p class="item-price font-bold text-3xl mt-4">¥9,500 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake06.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">イニスキリン ゴールド ヴィダル アイスワイン 2019 375ml 箱付 白ワイン カナダ オンタリオ 甘口</p>
                                <p class="item-price font-bold text-3xl mt-4">¥12,000 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake07.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">ドメーヌ シャンソン シャブリ 2022 750ml 白ワイン フランス ブルゴーニュ 辛口</p>
                                <p class="item-price font-bold text-3xl mt-4">¥4,200 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake08.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">シャトー ローザン セグラ 2021 750ml 赤ワイン フランス ボルドー フルボディ</p>
                                <p class="item-price font-bold text-3xl mt-4">¥15,800 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake09.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">ドメーヌ ドルーアン ラローズ ラトリシエール シャンベルタン グラン クリュ 2021 750ml 赤ワイン フランス
                                    ブルゴーニュ ミディアムフルボディ</p>
                                <p class="item-price font-bold text-3xl mt-4">¥48,000 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake10.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">ドメーヌ ドルーアン ラローズ シャンベルタン クロ ド ベーズ グラン クリュ 2021 750ml 赤ワイン フランス
                                    ブルゴーニュ フルボディ</p>
                                <p class="item-price font-bold text-3xl mt-4">¥60,000 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake11.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">ジェーン エア ジュヴレ シャンベルタン プルミエ クリュ レ コルボー 2021 750ml 赤ワイン フランス
                                    ブルゴーニュ ミディアムボディ</p>
                                <p class="item-price font-bold text-3xl mt-4">¥32,000 （税込）</p>
                            </div>
                        </a>
                        <a href="#" class="box w-full h-full relative transition-all duration-700 overflow-hidden">
                            <img src="./products/sake05.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                            <div>
                                <p class="item-title mt-4">谷川岳 源水吟醸 15% 正規品 1800ml 永井酒造 箱なし 日本酒</p>
                                <p class="item-price font-bold text-3xl mt-4">¥2,200 （税込）</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="paging">
                    <ul>
                        <a href="#">
                            <li class="page-active">1</li>
                        </a>
                        <a href="#">
                            <li>2</li>
                        </a>
                        <a href="#">
                            <li>3</li>
                        </a>
                        <a href="#">
                            <li>4</li>
                        </a>

                    </ul>
                </div>
            </div>
        </div>
        <div class="check-items">
            <h2>最近チェックした商品</h2>
            <div class="grid grid-cols-3 lg:grid-cols-4 gap-5">
                <a href="#" class="w-full h-full relative transition-all duration-700 overflow-hidden">
                    <img src="./products/sake01.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                    <div>
                        <p class="item-title mt-4">谷川岳 源水吟醸 15% 正規品 1800ml 永井酒造 箱なし 日本酒</p>
                        <p class="item-price font-bold text-3xl mt-4">¥2,200 （税込）</p>
                    </div>
                </a>
                <a href="#" class="w-full h-full relative transition-all duration-700 overflow-hidden">
                    <img src="./products/sake02.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                    <div>
                        <p class="item-title mt-4">ジェーン エア ジュヴレ シャンベルタン プルミエ クリュ レ コルボー 2021 750ml 赤ワイン フランス
                            ブルゴーニュ ミディアムボディ</p>
                        <p class="item-price font-bold text-3xl mt-4">¥32,000 （税込）</p>
                    </div>
                </a>
                <a href="#" class="w-full h-full relative transition-all duration-700 overflow-hidden">
                    <img src="./products/sake03.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                    <div>
                        <p class="item-title mt-4">ジェーン エア ジュヴレ シャンベルタン 2020 750ml 赤ワイン フランス ブルゴーニュ ミディアムボディ</p>
                        <p class="item-price font-bold text-3xl mt-4">¥11,800 （税込）</p>
                    </div>
                </a>
                <a href="#" class="w-full h-full relative transition-all duration-700 overflow-hidden">
                    <img src="./products/sake04.webp" alt="日本酒①の画像" class="w-full h-72 rounded-md object-cover cursor-pointer">
                    <div>
                        <p class="item-title mt-4">ドメーヌ アラン ビュルゲ ジュヴレ シャンベルタン メ ファヴォリット ヴィエイユ ヴィーニュ 2021 750ml
                            赤ワイン フランス ブルゴーニュ ミディアムボディ</p>
                        <p class="item-price font-bold text-3xl mt-4">¥14,500 （税込）</p>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- footer section -->
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

    <!-- top button -->
    <a href="#top" class="bg-theme hover:bg-selected-text transition-all duration-300 text-white lg:hidden fixed bottom-2 right-2 flex items-center justify-center w-14 h-14 p-5 rounded-full cursor-pointer">^</a>

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <!-- slickのJavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- ProgressBar.js -->
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!-- tailwindCSS cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- main js -->
    <script src="main.js"></script>
</body>

</html>