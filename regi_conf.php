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

            <form class="confirm" method="POST" action="regi_end.php" >
                <div class="confirm-group">
                    <p>お名前 *</p>
                    <p><?= $name; ?></p>
                    <input type="hidden" name="name" value="<?= $name; ?>">
                </div>
                <div class="confirm-group">
                    <p>Email *</p>
                    <p><?= $email; ?></p>
                    <input type="hidden" name="email" value="<?= $email; ?>">
                </div>
                <div class="confirm-group">
                    <p>パスワード *</p>
                    <p><?= $password; ?></p>
                    <input type="hidden" name="password" value="<?= $password; ?>">
                </div>
                <div class="confirm-group">
                    <p>住所 *</p>
                    <p><?= $address; ?></p>
                    <input type="hidden" name="address" value="<?= $address; ?>">
                </div>
                <div class="confirm-group">
                    <p>SQUAREからのお知らせを受信しますか？</p>
                    <p><?= $dm; ?></p>
                    <input type="hidden" name="dm" value="<?= $dm; ?>">
                </div>
                <div class="confirm-submit">
                    <p>この内容で送信してもよろしいですか？</p>
                    <input class="btn-submit" type="submit" value="送信する">
                </div>
            </form>
        </div>
    </section>
    
</body>
</html>