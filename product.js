$(document).ready(function(){
  $('.image-slider').slick({
      dots: true, // ドットナビゲーションを表示
      infinite: true, // 無限ループ
      speed: 500, // トランジションの速度
      slidesToShow: 1, // 表示するスライド数
      slidesToScroll: 1, // スクロールするスライド数
      autoplay: true, // 自動再生
      autoplaySpeed: 2000 // 自動再生のスピード
  });
});