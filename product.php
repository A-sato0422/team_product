<?php
require_once "./encode.php";

session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

$name = e($_POST['name'] ?? '');
$price = e($_POST['price'] ?? '');
$count = e($_POST['count'] ?? '');

session_start();
// カートにすでに商品が入っている場合、個数を追加する
if (isset($_SESSION['products'])) {
    $products = $_SESSION['products'];
    foreach ($products as $key => $product) {
        if ($key == $name) {
            $count = (int)$count + (int)$product['count'];
        }
    }
}

if ($name != '' && $price != '' && $count != '') {
    $_SESSION['products'][$name] = [
        'price' => $price,
        'count' => $count
    ];
}
$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

if (isset($_POST['name'])) {
    $resultMessage = "商品をカートに追加しました";
} else {
    $resultMessage = "";
}

// 画面上部にセッション情報を表示
// if (isset($products)) {
//     foreach ($products as $key => $product) {
//         echo $key;      //商品名
//         echo "<br>";
//         echo $product['count'];  //商品の個数
//         echo "<br>";
//         echo $product['price']; //商品の金額
//         echo "<br>";
//     }
// }

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
</head>
<!-- CSS -->
<link rel="stylesheet" href="./list_page.css">
<link rel="stylesheet" href="./product.css">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="./dropdown_UI.css">

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
                <div>
                    <li class="menu-item"><a href="./list_page.php">商品を探す</a></li>
                    <li class="menu-item"><a href="#">特集一覧</a></li>
                    <li class="menu-item"><a href="#">お気に入り</a></li>
                    <li class="menu-item"><a href="#">ご利用ガイド</a></li>
                    <li class="menu-item"><a href="#">店舗一覧</a></li>
                </div>
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
        <div class="main">
            <section>
                <div class="image-field">
                    <img src="./img/wine1.jpg" class="bigimg" id="bigimg">
                    <ul>
                        <li><img src="./img/wine1.jpg" class="thumb" data-image="wine1.jpg"></li>
                        <li><img src="./img/wine2.jpg" class="thumb" data-image="wine2.jpg"></li>
                    </ul>
                </div>
            </section>
            <div class="letter-field">
                <div class="share-img">
                    <h4>シェア</h4>
                    <ul>
                        <li><img src="./img/instagram .svg" alt="Instagram"></li>
                        <li><img src="./img/twitter .svg" alt="X"></li>
                    </ul>
                </div>
                <div class="shopping-title">
                    <h1>ジェーン エア ジュヴレ シャンベルタン プルミエ クリュ レ コルボー 2021 750ml 赤ワイン フランス ブルゴーニュ ミディアムボディ</h1>
                </div>
                <div class="shopping-button">
                    <form class="item-form" method="POST" action="./product.php">
                        <div class="amount">
                            <p class="price">\32000</p>
                            <input type="hidden" name="name" value="ジェーン エア ジュヴレ シャンベルタン プルミエ クリュ レ コルボー 2021 750ml 赤ワイン フランス ブルゴーニュ ミディアムボディ">
                            <input type="hidden" name="price" value="32000">
                            <label for="count">個数</label>
                            <input type="text" value="1" name="count" class="count" id="count">
                        </div>
                        <button type="submit" class="cart-button">カートに入れる</button>
                        <!-- PHP処理後のメッセージを表示 -->
                        <?php if (isset($resultMessage)) : ?>
                            <p class="result-message"><?= $resultMessage ?></p>
                        <?php endif; ?>

                    </form><!-- end item-form -->
                    <button type="button" class="like-button">☆お気に入り</button>
                    <p>----------------------関連リンク----------------------</p>
                    <button type="button" class="category-button">ワイン</button>
                </div>
                <div class="warning">
                    <p>※こちらの商品は蝋キャップでございます。仕入れ時点での蝋キャップのダメージ（欠け・ヒビ割れ）がある商品がございます。品質には影響しませんが、ご了承の上、ご購入くださいますようお願い致します。※
                        ※ボトル画像はイメージです。ラベルやキャップシール等の色、デザインが変更となる場合がございます。※</p>
                </div>
                <div class="text">
                    <span class="text-title">
                        ■商品について<br>
                    </span>
                    かねてよりの念願であった自身のワイン造りを、2011年に実現させた「ジェーン・エア」。
                    オーストラリアのメルボルン近郊出身のジェーン・エア女史が手がける新進気鋭のネゴシアンです。
                    こちらは、ジュヴレシャンベルタン村のグランクリュ斜面の北端に位置する1級畑「レ・コルボー」。
                    グランクリュ・マジシャンベルタンの隣にあり、複雑で力強いワインを生み出します。
                </div>
                <div class="text">
                    <span class="text-title">
                        ■このワインについて <br>
                    </span>
                    栽培
                    ・土壌：石灰岩と粘土質
                    ・樹齢：50年
                    醸造
                    ・発酵：80%除梗、20%全房発酵
                    手摘みされたブドウはステンレスタンクを使用し天然酵母で発酵。
                    必要に応じて穏やかなルモンタージュとピジャージュを組み合わせて行う。
                    ・熟成：228Lのフレンチオーク樽（40%新樽）で14ヶ月熟成
                    無清澄、無ろ過、瓶詰め前に軽くラッキングを行う。
                    テイスティング・コメント
                    ピュアな果実味。
                    真っ赤なフルーツ、スミレ、桑の香り。
                    味わいは繊細な酸味とミネラルの緊張感。
                    しっかりとしたタンニンを持っている。
                    濃厚なレッドチェリーとシナモンのフレーバーがフィニッシュに残る。
                    ※インポーター資料より引用
                </div>
                <div class="text">
                    <span class="text-title">
                        ■飲み頃温度 <br>
                    </span>
                    16〜18℃
                </div>
                <div class="text">
                    <span class="text-title">
                        ■オススメ料理 <br>
                    </span>
                    仔牛のタルタル
                    ポルチーニ茸のリゾット
                    すき焼き
                    コンテ チーズ（ハードタイプ）
                </div>
                <div class="text">
                    <span class="text-title">
                        ■ネゴシアンとは <br>
                    </span>
                    ネゴシアン（Negociant）とは、フランス語で「卸売業者」や「卸売商」を意味する言葉。
                    特にワインの流通に携わる業者を指すことが一般的です（Negociant en vins）。
                    その中でもブルゴーニュなどの小規模生産者が多い地区では、自社ではブドウの栽培は行わずに、農家から仕入れたブドウやブドウ果汁でワインを醸造。
                    自社ブランドとして出荷する生産者のことを指し、日本でもこの意味合いで使われることが多くなっています。
                </div>
                <div class="text">
                    <span class="text-title">
                        ■ジュヴレ・シャンベルタンについて <br>
                    </span>
                    かの「ナポレオン」が愛した「ジュヴレ・シャンベルタン」の始まりは640年、コート・ド・ニュイ最大にして最多のグラン・クリュを持ち、ブルゴーニュ地方の中で最高峰を誇る赤ワインを多く生み出しています。
                    村の南側、標高260〜320mの斜面に9つのグラン・クリュが並び、プルミエ・クリュは標高280〜380mにあり斜面の上部（浅い褐色の石灰岩土壌）を占めています。
                    次に村名アペラシオンの畑が、褐色のカルシウムと褐色の石灰岩の土壌にあります。
                    ブドウは台地から運ばれた赤い泥土と崩落土に覆われた泥灰土でよく育ち、これらの小石はワインにエレガンスとフィネスを与え、貝の化石を含んだ泥灰土はボディ、堅固さを与えています。
                </div>
                <div class="text">
                    <span class="text-title">
                        ■原産地呼称 <br>
                    </span>
                    AOC. GEVREY CHAMBERTIN（ジュヴレ・シャンベルタン）
                </div>
                <div class="text">
                    <span class="text-title">
                        ■格付 <br>
                    </span>
                    1級畑（プルミエ・クリュ）
                </div>
                <div class="text">
                    原産国/地域：フランス　ブルゴーニュ（コート・ド・ニュイ：ジュヴレ・シャンベルタン）
                    度数：13%
                    容量：750ml
                    発送目安：
                    14時までに注文確定すると当日発送が可能です。
                    ※ただし、14時までに決済確認、振り込み確認がとれた場合のみとなります。
                    発送予定日：2024年05月24日にお届け予定です。
                    ※配送状況によりご希望のお届け日に沿えない場合がございます。
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
                    <p><a href="./about.html">会社概要</a></p>
                    <p><a href="#">サービス</a></p>
                    <p><a href="./contact.php">お問い合わせ</a></p>
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
    <script src="product.js"></script>
</body>

</html>