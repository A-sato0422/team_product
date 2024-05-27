'use strict';
{
    // sp nav menu
    const menuIcon = document.getElementById('menu-icon');
    const menuContent = document.getElementById('menu-content');
    const overlay = document.getElementById('overlay');
    const navBar = document.querySelectorAll('.nav-bar');
    const overlayItem = document.querySelectorAll('.overlay-item');

    function navAction() {
        overlay.classList.toggle('appear');
        menuContent.classList.toggle('appear');
        navBar.forEach(e => {
            e.classList.toggle('push')
        });;
    }

    menuIcon.addEventListener('click', () => {
        navAction();
    });

    overlayItem.forEach(e => {
        e.addEventListener('click', () => {
            navAction();
        });
    });

    // carousel UI
    $(function () {
        $(".slide-items").slick({
            autoplay: true,
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            dots: true,
            responsive: [{
                breakpoint: 768, // ブレイクポイントを指定
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    centerPadding: '20%',
                },
            }]
        });
    });

    // scroll up UI
    window.addEventListener('scroll', function () {
        // スクロール量を取得
        const scroll = window.scrollY;
        // 画面の高さを取得
        const windowHeight = window.innerHeight;
        // すべての.boxを取得
        const boxes = document.querySelectorAll('.box');

        boxes.forEach(function (box) {
            // boxまでの高さを取得
            const distanceToBox = box.offsetTop;

            // 下記条件が成り立つときだけboxにis-activeクラスを付与する
            if (distanceToBox - scroll < windowHeight * 0.8) {
                box.classList.add('is-active');
            }
        });
    });

    //アコーディオンをクリックした時の動作
    $('.title').on('click', function () {//タイトル要素をクリックしたら
        const findElm = $(this).next(".search-content");//直後のアコーディオンを行うエリアを取得し
        $(findElm).slideToggle();//アコーディオンの上下動作

        if ($(this).hasClass('close')) {//タイトル要素にクラス名closeがあれば
            $(this).removeClass('close');//クラス名を除去し
        } else {//それ以外は
            $(this).addClass('close');//クラス名closeを付与
        }
    });
}