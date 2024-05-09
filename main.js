'use strict';
{
    // menu-bar
    const bookCloseNav = document.querySelector('.book-close-btn');
    const bookOpenNav = document.querySelector('.book-open-btn');
    const menuBar = document.querySelector('.menu-bar');

    bookCloseNav.addEventListener('click', () => {
        menuBar.classList.toggle('active');
        bookCloseNav.classList.toggle('active');
        bookOpenNav.classList.toggle('active');
    });

    bookOpenNav.addEventListener('click', () => {
        menuBar.classList.toggle('active');
        bookCloseNav.classList.toggle('active');
        bookOpenNav.classList.toggle('active');
    });

    // carousel effect
    $(function () {
        $(".slide-items").slick({
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            fade: true,
            cssEase: 'linear',
            speed: 600,
            arrows: true
        });
    });
}