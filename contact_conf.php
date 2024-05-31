<?php
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: contact.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 'me@example.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
内容：
{$post['contact']}
EOT;
    // var_dump($body);
    // exit();
    //mb_send_mail($to, $subject, $body, "From: {$from}");

    // セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: contact_thanks.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ(確認画面) | 地酒.com</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
</head>

<body>
    <!-- お問合せフォーム画面 -->
    <section class="contact-conf">
        <div class="contact-conf-container">
            <form action="" method="POST">
                <div class="contact-title">
                    <h2>CONTACT</h2>
                    <h4>お問い合わせ(確認画面)</h4>
                </div>

                <div class="contact-conf-form-group">
                    <label for="inputName">お名前</label><br>
                </div>
                <p class="display_item"><?php echo htmlspecialchars($post['name']); ?></p>

                <div class="contact-conf-form-group">
                    <label for="inputEmail">Email</label><br>

                </div>
                <p class="display_item"><?php echo htmlspecialchars($post['email']); ?></p>

                <div class="contact-conf-form-group">
                    <label for="inputContent">お問い合わせ内容</label>
                </div>
                <p class="display_item"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>

                <div class="contact-conf-form-group">
                    <button class="revers"><a href="contact.php">戻る</a></button>
                    <button class="submit" type="submit">送信する</button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>