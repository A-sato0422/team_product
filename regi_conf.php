<?php
require_once "./encode.php";

$name = e($_POST['name'] ?? '');
$email = e($_POST['email'] ?? '');
$password = e($_POST['password'] ?? '');
$address = e($_POST['address'] ?? '');
$dm = e($_POST['dm'] ?? '');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="./register.css">
    <title>登録内容確認 | 地酒.com</title>
</head>
<body>
    <section class="regi-conf">
        <div class="container">
            <div class="register-title">
                <h2>CONFIRM</h2>
                <h4>登録内容確認</h4>
            </div>

            <div class="confirm">
                <div class="confirm-group">
                    <p>お名前 *</p>
                    <p><?= $name; ?></p>
                </div>
                <div class="confirm-group">
                    <p>Email *</p>
                    <p><?= $email; ?></p>
                </div>
                <div class="confirm-group">
                    <p>パスワード *</p>
                    <p><?= $password; ?></p>
                </div>
                <div class="confirm-group">
                    <p>住所 *</p>
                    <p><?= $address; ?></p>
                </div>
                <div class="confirm-group">
                    <p>SQUAREからのお知らせを受信しますか？</p>
                    <p><?= $dm; ?></p>
                </div>
                <div class="confirm-submit">
                    <p>この内容で送信してもよろしいですか？</p>
                    <button>送信する</button>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>