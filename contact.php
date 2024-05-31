<?php
session_start();
$error = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact'])) {
        $post = [
            "name" =>    $_POST['name'],
            "email" =>   $_POST['email'],
            "contact" => $_POST['contact']
        ];

        // フォームの送信時にエラーをチェックする
        if (isset($post['name']) && $post['name'] === '') {
            $error['name'] = 'blank';
        }
        if (isset($post['email']) && $post['email'] === '') {
            $error['email'] = 'blank';
        } else if (isset($post['email']) && !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'email';
        }
        if (isset($post['contact']) && $post['contact'] === '') {
            $error['contact'] = 'blank';
        }

        if (count($error) === 0) {
            // エラーがないので確認画面に移動
            $_SESSION['form'] = $post;
            header('Location: contact_conf.php');
            exit();
        }
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ | 地酒.com</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
</head>

<body>
    <!-- お問合せフォーム画面 -->
    <section class="contact">
        <div class="contact-container">
            <form action="" method="POST" novalidate>
                <div class="contact-title">
                    <h2>CONTACT</h2>
                    <h4>お問い合わせ</h4>
                </div>

                <div class="contact-form-group">
                    <label for="inputName">お名前<span class="require">　*必須</span></label><br>
                </div>
                <input type="text" size="30" name="name" id="inputName" class="form-control" value="<?php if (isset($post['name'])) {
                                                                                                echo htmlspecialchars($post['name']);
                                                                                            } ?>" required autofocus>
                <?php if (isset($error['name']) && $error['name'] === 'blank') : ?>
                    <p class="error_msg">※お名前をご記入下さい</p>
                <?php endif; ?>

                <div class="contact-form-group">
                    <label for="inputEmail">メールアドレス <span class="require">　*必須</span></label><br>
                    <input type="email" size="30" name="email" id="inputEmail" class="form-control" value="<?php if (isset($post['email'])) {
                                                                                                        echo htmlspecialchars($post['email']);
                                                                                                    } ?>" required>
                    <?php if (isset($error['email']) && $error['email'] === 'blank') : ?>
                        <p class="error_msg">※メールアドレスをご記入下さい</p>
                    <?php endif; ?>
                    <?php if (isset($error['email']) && $error['email'] === 'email') : ?>
                        <p class="error_msg">※メールアドレスを正しくご記入ください</p>
                    <?php endif; ?>
                </div>

                <div class="contact-form-group">
                    <label for="inputContent">お問い合わせ内容 <span class="require">　*必須</span></label><br>
                    <textarea name="contact" size="30" id="inputContent" rows="10" class="form-control" required><?php if (isset($post['contact'])) {
                                                                                                            echo htmlspecialchars($post['contact']);
                                                                                                        } ?></textarea>
                    <?php if (isset($error['contact']) && $error['contact'] === 'blank') : ?>
                        <p class="error_msg">※お問い合わせ内容をご記入下さい</p>
                    <?php endif; ?>
                </div>
                <div>
                    <button class="submit" type="submit">確認画面へ</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>