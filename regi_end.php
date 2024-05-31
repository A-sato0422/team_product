<?php
// エンコード処理の外部ファイル
require_once "./encode.php";
// PDOインスタンスを返す外部ファイル
require_once "./db_manager.php";

$name = e($_POST['name'] ?? '');
$email = e($_POST['email'] ?? '');
$password = e($_POST['password'] ?? '');
$tel = e($_POST['tel'] ?? '');
$postcode = e($_POST['postcode'] ?? '');
$address = e($_POST['address'] ?? '');
$dm = e($_POST['dm'] ?? '');
$dm_flag = ($dm == '受信する') ? 1 : 0;

session_start();
if ($name != '' && $email != '' && $tel != '' && $postcode != '' && $address != '') {
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email,
        'tel' => $tel,
        'postcode' => $postcode,
        'address' => $address,
    ];
}
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];

// 画面上部にセッション情報を表示
// if (isset($user)) {
//     echo $user['name'];
//     echo "<br>";
//     echo $user['email'];
//     echo "<br>";
//     echo $user['tel'];
//     echo "<br>";
//     echo $user['postcode'];
//     echo "<br>";
//     echo $user['address'];
//     echo "<br>";
// }

try {
    $db = getDb();
} catch (PDOException $e) {
    print "エラーメッセージ:" . $e->getMessage();
}

$stt = $db->prepare('INSERT INTO users (name, email, password, address, dm, created_at, updated_at) VALUES (:name, :email, :password, :address, :dm, now(), now())');
$stt->bindValue(':name', $name);
$stt->bindValue(':email', $email);
$stt->bindValue(':password', $password);
$stt->bindValue(':address', $address);
$stt->bindValue(':dm', $dm_flag);
$stt->execute();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./register.css">
    <title>登録完了 | 地酒.com</title>
</head>

<body>
    <section class="regi-end">
        <div class="container">
            <div class="register-title">
                <h2>登録が完了しました</h2>
                <h4>ご登録ありがとうございました。</h4>
                <a href="./index.php">
                    <button class="btn-top">お買い物を続ける</button>
                </a>
            </div>
        </div>
    </section>

</body>

</html>