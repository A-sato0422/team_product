<?php
require_once "./encode.php";

$name = e($_POST['name'] ?? '');
$price = e($_POST['price'] ?? '');
$count = e($_POST['count'] ?? '');

session_start();
// カートにすでに商品がはいいている場合、個数を追加する
if(isset($_SESSION['products'])) {
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
    <!-- <link rel="stylesheet" href="responsive.css"> -->

    <!-- icon -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="index.php"><img src="img/square_logo.png" id="logo"></a></h1>
            </div>

            <!-- ハンバーガーメニューボタン -->
            <div class="toggle">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="cart">
                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            </div>

            <nav class="sp-menu menu">
                <ul>
                    <li><a href="index.php#service">サービス</a></li>
                    <li><a href="shop.php">商品一覧</a></li>
                    <li><a href="index.php#news">お知らせ</a></li>
                    <li><a href="index.php#about">会社概要</a></li>
                    <li><a href="ブログのURL">ブログ</a></li>
                    <li><a href="register.html">会員登録</a></li>
                </ul>
            </nav>

            <nav class="pc-menu menu-left menu">
                <ul>
                    <li><a href="index.php#service">サービス</a></li>
                    <li><a href="shop.php">商品一覧</a></li>
                    <li><a href="index.php#news">お知らせ</a></li>
                    <li><a href="index.php#about">会社概要</a></li>
                    <li><a href="ブログのURL">ブログ</a></li>
                </ul>
            </nav>
            <nav class="pc-menu menu-right menu">
                <ul>
                    <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="register.html">会員登録</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="index.php">TOP</a></li>
                    <li>商品一覧</li>
                </ul>
            </div>
        </div>
        <div class="wrapper last-wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>SHOP</h3>
                    <p>商品一覧</p>
                </div>
                <div class="itemlist">
                    <ul>
                        <li>
                            <img src="products/_nophoto.png">
                            <div class="item-body">
                                <h5>バナナ</h5>
                                <p>¥500</p>
                                <form class="item-form" method="POST" action="shop.php">
                                    <input type="hidden" name="name" value="バナナ">
                                    <input type="hidden" name="price" value="500">
                                    <input type="text" value="1" name="count">
                                    <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                </form><!-- end item-form -->
                            </div><!-- end item-body-->
                        </li>
                        <li>
                            <img src="products/_nophoto.png">
                            <div class="item-body">
                                <h5>きゅうり</h5>
                                <p>¥100</p>
                                <form class="item-form" method="POST" action="shop.php">
                                    <input type="hidden" name="name" value="きゅうり">
                                    <input type="hidden" name="price" value="100">
                                    <input type="text" value="1" name="count">
                                    <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                </form><!-- end item-form -->
                            </div><!-- end item-body-->
                        </li>
                        <li>
                            <img src="products/_nophoto.png">
                            <div class="item-body">
                                <h5>玉ねぎ</h5>
                                <p>¥200</p>
                                <form class="item-form" method="POST" action="shop.php">
                                    <input type="hidden" name="name" value="たまねぎ">
                                    <input type="hidden" name="price" value="200">
                                    <input type="text" value="1" name="count">
                                    <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                </form><!-- end item-form -->
                            </div><!-- end item-body-->
                        </li>
                        <li>
                            <img src="products/_nophoto.png">
                            <div class="item-body">
                                <h5>トマト</h5>
                                <p>¥150</p>
                                <form class="item-form" method="POST" action="shop.php">
                                    <input type="hidden" name="name" value="トマト">
                                    <input type="hidden" name="price" value="150">
                                    <input type="text" value="1" name="count">
                                    <button type="submit" class="btn-sm btn-blue">カートに入れる</button>
                                </form><!-- end item-form -->
                            </div><!-- end item-body-->
                        </li>
                    </ul>
                </div><!-- end itemlist -->
            </div>
        </div>

    </main>
    <footer>
        <div class="container">
            <p>Copyright @ 2018 SQUARE, inc.</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(function() {
            // ハンバーガーメニューの動作
            $('.toggle').click(function() {
                $("header").toggleClass('open');
                $(".sp-menu").slideToggle(500);
            });
        });
    </script>

</body>

</html>