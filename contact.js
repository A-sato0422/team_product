
'use strict';

$(function() {
  $('button[type=submit]').on('click', function() {

    // Formに入力されたデータを取得
    const name = $('#name').val();
    const email = $('#email').val();
    const body = $('#inquiry-body').val();

    // 連想配列化
    var postData = {"name":name, "email":email, "body":body};

    // POSTで送信
    $.post(
      "contact.php",
      postData,
    );

    // 送信完了後の処理（送信完了のメッセージ表示）
    $('.send-email').html('<p>送信完了しました。お問い合わせありがとうございます。</p>');
    $('#name').val("");
    $('#email').val("");
    $('#inquiry-body').val("");
  });
});