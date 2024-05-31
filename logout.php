<?php
// エンコード処理の外部ファイル
require_once "./encode.php";
// PDOインスタンスを返す外部ファイル
require_once "./db_manager.php";
session_start();
unset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./register.css">
    <title>ログアウト | 地酒.com</title>
</head>

<body>
    <section class="regi-end">
        <div class="container">
            <div class="register-title">
                <h2>ログアウトが完了しました</h2>
                <h4>またのお越しをお待ちしております。</h4>
                <a href="./index.php">
                    <button class="btn-top">トップ画面に戻る</button>
                </a>
            </div>
        </div>
    </section>

</body>

</html>