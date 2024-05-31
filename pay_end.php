<?php
// エンコード処理の外部ファイル
require_once "./encode.php";
// PDOインスタンスを返す外部ファイル
require_once "./db_manager.php";

$name = e($_POST['name'] ?? '');
$mail = e($_POST['mail'] ?? '');
$tel = e($_POST['tel'] ?? '');
$postcode = e($_POST['postcode'] ?? '');
$address = e($_POST['address'] ?? '');

session_start();
$products = $_SESSION['products'] ?? [];
$total = 0;
$subtotal = 0;
// カートの合計の計算
foreach ($products as $key => $product) {
    $subtotal = (int)$product['price'] * (int)$product['count'];
    $total += $subtotal;
}

try {
    $db = getDb();
} catch (PDOException $e) {
    print "エラーメッセージ:" . $e->getMessage();
}

// orderテーブルのSQL
$stt = $db->prepare('INSERT INTO orders (name, mail, tel, postcode, address, total, created_at, updated_at) VALUES (:name, :mail, :tel, :postcode, :address, :total, now(), now())');
$stt->bindValue(':name', $name);
$stt->bindValue(':mail', $mail);
$stt->bindValue(':tel', $tel);
$stt->bindValue(':postcode', $postcode);
$stt->bindValue(':address', $address);
$stt->bindValue(':total', $total);
$stt->execute();

// ordersのid取得
$order_id = $db->lastInsertId();

// order_productsテーブルのSQL
foreach ($products as $key => $product) {
    $stt2 = $db->prepare('INSERT INTO order_products (order_id, product_name, num, price) VALUES (:order_id, :product_name, :num, :price)');
    $stt2->bindValue(':order_id', $order_id);
    $stt2->bindValue(':product_name', $key);
    $stt2->bindValue(':num', $product['count']);
    $stt2->bindValue(':price', $product['price']);
    $stt2->execute();
}

unset($_SESSION['products']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./register.css">
    <title>購入完了 | 地酒.com</title>
</head>

<body>
    <section class="regi-end">
        <div class="container">
            <div class="register-title">
                <h2>購入が完了しました</h2>
                <h4>お買い上げいただき誠にありがとうございました。</h4>
                <a href="./index.php">
                    <button class="btn-top">お買い物を続ける</button>
                </a>
            </div>
        </div>
    </section>

</body>

</html>