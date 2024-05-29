<?php
session_start();
$error = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact'])){
  $post = [
    "name" => $_POST['name'],
   "email" => $_POST['email'],
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
        header('Location: confirm.php');
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
    <title>お問合せフォーム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="contact.css">
</head>
<body>
    <!-- お問合せフォーム画面 -->
    <div class="container">
        <form action="" method="POST" novalidate>
            <p>お問い合わせ</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="inputName">お名前</label>
                    </div>
                    <div class="col-2">
                        <p class="require_item">必須</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="name" id="inputName" class="form-control" value="<?php if (isset($post['name'])){echo htmlspecialchars($post['name']);} ?>" required autofocus>
                        <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                            <p class="error_msg">※お名前をご記入下さい</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="inputEmail">メールアドレス</label>
                    </div>
                    <div class="col-2">
                        <p class="require_item">必須</p>
                    </div>
                    <div class="col-8">
                        <input type="email" name="email" id="inputEmail" class="form-control" value="<?php if (isset($post['email'])){echo htmlspecialchars($post['email']);} ?>" required>
                        <?php if (isset($error['email']) && $error['email'] === 'blank'): ?>
                            <p class="error_msg">※メールアドレスをご記入下さい</p>
                        <?php endif; ?>
                        <?php if (isset($error['email']) && $error['email'] === 'email'): ?>
                            <p class="error_msg">※メールアドレスを正しくご記入ください</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="inputContent">お問い合わせ内容</label>
                    </div>
                    <div class="col-2">
                        <p class="require_item">必須</p>
                    </div>
                    <div class="col-8">
                        <textarea name="contact" id="inputContent" rows="10" class="form-control" required><?php if (isset($post['contact'])){echo htmlspecialchars($post['contact']);} ?></textarea>
                        <?php if (isset($error['contact']) && $error['contact'] === 'blank'): ?>
                            <p class="error_msg">※お問い合わせ内容をご記入下さい</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-4">
                    <button type="submit">確認画面へ</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>